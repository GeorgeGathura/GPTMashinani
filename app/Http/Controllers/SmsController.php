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

        $content = json_decode($request->getContent());

        //determine if it is registration or conversation
        $phoneNumber = str_replace('"', '', $content->phone_number);
        $phoneNumber2 = '';
        if (substr($phoneNumber, 0, 3) == '254') {
            $phoneNumber2 = '0'.substr($phoneNumber, 3);
        } else {
            $phoneNumber2 = '254'.substr($phoneNumber, 1);
        }

        $message = $content->message;

        $detectedUser = User::where('phone', $phoneNumber)
            ->orWhere('phone', $phoneNumber2)
            ->first();

        $noLogs = SmsLog::where('phoneNumber',$phoneNumber)
                        ->orWhere('phoneNumber', $phoneNumber2)
                        ->count();

        SmsLog::create([
            'message' => $message,
            'phoneNumber' => $phoneNumber,
            'source' => 'USER',
            'initialStatus' => '00 - Success',
            'messageId' => $content->link_id,
            'systemStatus' => 1,
        ]);

        if ($detectedUser) {
            $this->converse($detectedUser, $message,$content->link_id);
        } else {

            if($noLogs == 0){
                $this->firstUse($phoneNumber,$content->link_id);
            }else{
                $this->register($phoneNumber, $message,$content->link_id);
            }
        }

        return response()->json(['success' => 'success'], 200);
    }
    /**
     * Register a subscriber into the system
     */
    private function firstUse($recipient,$messageId)
    {
        $message = 'Hello. To get started enter your Full Name';

        Artisan::call('sms:send', [
            'message' => $message,
            'recipient' => $recipient,
            'linkId' => $messageId,
        ]);
    }

    /**
     * Register a subscriber into the system
     */
    private function register($recipient, $fullName,$messageId)
    {
        $password = $this->generateRandomString(5);
        $fictionalEmail = $this->clean($fullName).'@chatmtaani.com';

        User::create([
            'name' => $fullName,
            'phone' => $recipient,
            'email' => $fictionalEmail,
            'password' => bcrypt($password),
        ]);

        $message = 'Welcome to ChatMtaani, Your account has been created on our platform.';
        $message .= 'You can ask our A.I platform questions via SMS.';
        $message .= ' Visit our website at www.chatmtaani.com for more information.';

       // $message .= ' and enter email '.$fictionalEmail.' and  password '.$password;

        Artisan::call('sms:send', [
            'message' => $message,
            'recipient' => $recipient,
            'linkId' => $messageId,
        ]);
    }

    private function clean($string)
    {
        $string = str_replace(' ', '', $string);
        $string = preg_replace('/[^A-Za-z0-9ĞİŞığşçö\-]/', '_', $string);
        $string = strtolower($string);

        return preg_replace('/-+/', '-', $string);
    }

    private function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    private function converse(User $user, $message,$messageId)
    {
        $response = $this->communicate($user, $message);

        Artisan::call('sms:send', [
            'message' => $response,
            'recipient' => $user->phone,
            'linkId' => $messageId,
        ]);
    }

    private function communicate(User $user, $question): string
    {
        //try {
        $yourApiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);

        $maxToken = 120 + strlen($question);
        $question .='In less than 160 words, '.$question;
        $result = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $question,
            'temperature' => 0.4,
            'max_tokens' => $maxToken,
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
            'wordCount' => $wordCount,
        ]);

        return $response;
    }
}
