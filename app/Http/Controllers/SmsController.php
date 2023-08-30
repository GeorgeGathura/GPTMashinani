<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\SmsLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use OpenAI;

class SmsController extends Controller
{
    /**
     * Recipient method for all SMS messages
     * message: "Lorem Ipsum...",
     * phone_number: "2547XXXXXXXX",
     * link_id: "14101445075801587923",
     * message_time: "0000-00-00 00:00:00"
     */
    public function receive(Request $request)
    {
        //determine if it is registration or conversation
       $phoneNumber = $request->input('phone_number');
       $phoneNumber2 = '';
       if( substr($phoneNumber,0,3) =='254')
       {
        $phoneNumber2='0'. substr($phoneNumber,3);
       }else
       {
        $phoneNumber2='254'. substr($phoneNumber,2);
       }

       $message = $request->input('message');

       $detectedUser = User::where('phone',$phoneNumber)
                    ->orWhere('phone',$phoneNumber2)
                    ->first();


       if($detectedUser){
            $this->converse($detectedUser,$message);
       }else{
        $this->register($phoneNumber,$message);
       }
       return response()->json(['success' => 'success'], 200);

    }

    /**
     * Register a subscriber into the system
     */
    private function register($recipient, $fullName)
    {
        $password = $this->generateRandomString(5);
        $fictionalEmail = $this->clean($fullName).'@chatmtaani.com';
        User::create([
            'name'=>$fullName,
            'phone'=>$recipient,
            'email'=>$fictionalEmail,
            'password'=>bcrypt($password),
        ]);

        $message ='Welcome to ChatMtaani, Your account has been created on our platform.';
        $message .='You can ask our A.I platform questions via SMS.';
        $message .=' To access it in the web go to www.chatmtaani.com';
        $message .=' and enter email '.$fictionalEmail.' and  password '.$password;

        Artisan::call('sms:send', [
            'message' => $message,
            'recipient' => $recipient
        ]);
    }

    private function clean($string) {
        $string = str_replace(' ', ' ', $string);
        $string = preg_replace('/[^A-Za-z0-9ĞİŞığşçö\-]/', ' ', $string);

        return preg_replace('/-+/', '-', $string);
     }
    private function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    private function converse(User $user,$message)
    {
        $response = $this->communicate($user,$message);

        Artisan::call('sms:send', [
            'message' => $response,
            'recipient' => $user->phone
        ]);
    }

    private function communicate(User $user,$question):string
    {
        //try {
        $yourApiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);

        $maxToken = 120 + strlen($question);

        $result = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $question,
            'temperature'=>0.4,
            'max_tokens'=>$maxToken
        ]);

        // $result = $client->chat()->create([
        //     'model' => 'gpt-3.5-turbo',
        //     'messages' => [
        //         ['role' => 'user',
        //         'content' => $question],
        //     ],
        //     'temperature'=>0.4,
        //     'max_tokens'=>$maxToken
        // ]);
        //dd($result);
        $response = '';
        foreach ($result['choices'] as $choice) {
            $response .= $choice['text'];
        }
        $wordCount = strlen($question) + strlen($response);

        Conversation::create([
            'query' => $question,
            'answer' => $response,
            'user_id' => $user->id,
            'smsCompliance' => false,
            'wordCount' => $wordCount
        ]);
        return $response;
    }
}
