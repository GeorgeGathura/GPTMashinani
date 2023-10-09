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


        $noLogs = SmsLog::where('phoneNumber', $phoneNumber)
            ->orWhere('phoneNumber', $phoneNumber2)
            ->count();
        if ($noLogs == 0) {
            $this->register($phoneNumber);
        }
        SmsLog::create([
            'message' => $message,
            'phoneNumber' => $phoneNumber,
            'source' => 'USER',
            'initialStatus' => '00 - Success',
            'messageId' => $content->link_id,
            'systemStatus' => 1,
        ]);

        $detectedUser = User::where('phone', $phoneNumber)
                            ->orWhere('phone', $phoneNumber2)
                            ->first();

        if ($detectedUser) {
            $this->converse($detectedUser, $message, $content->link_id);
        } else {

            // if ($noLogs == 0) {
            //     $this->firstUse($phoneNumber, $content->link_id);
            // } else {
            //     $this->register($phoneNumber, $message, $content->link_id);
            // }
        }

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Register a subscriber into the system
     */
    private function firstUse($recipient, $messageId)
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
    private function register($recipient, $fullName='', $messageId='')
    {
        $password = $this->generateRandomString(5);
        if($fullName==''){
            $fullName = $this->generateRandomString(12);
        }
        $fictionalEmail = $this->clean($fullName).'@chatmtaani.com';
        $exists = User::where('email', $fictionalEmail)->count();
        if ($exists != 0) {
            $randomLetters = $this->generateRandomString(5);
            $fictionalEmail .= $fictionalEmail.$randomLetters;
        }
        User::create([
            'name' => $fullName,
            'phone' => $recipient,
            'email' => $fictionalEmail,
            'password' => bcrypt($password),
        ]);

        // $message = 'Welcome to ChatMtaani. Your account has been created on our platform.';
        // $message .= ' You can ask our A.I platform questions via SMS.';
        // $message .= ' Visit our website at www.chatmtaani.com for more information.';
        // $message .= ' To proceed, ask me any question';
        // // $message .= ' and enter email '.$fictionalEmail.' and  password '.$password;

        // Artisan::call('sms:send', [
        //     'message' => $message,
        //     'recipient' => $recipient,
        //     'linkId' => $messageId,
        // ]);
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

    private function converse(User $user, $message, $messageId)
    {
        $response = $this->communicate($user, $message);
        //dd($response);
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
        $question = 'In less than 500 characters, '.$question;

        $history = Conversation::where('user_id', $user->id)->limit(4)->get();
        $messages = [];

        array_push(
            $messages,
            [
                'role' => 'user',
                'content' => 'Hi, My Name is '.$user->name,
            ],
            [
                'role' => 'assistant',
                'content' => 'Welcome to ChatMtaani '.$user->name,
            ]
        );
        foreach ($history as $conversation) {

            array_push($messages, [
                'role' => 'user',
                'content' => $conversation->query,
            ], [
                'role' => 'assistant',
                'content' => $conversation->answer,
            ]);
        }
        array_push($messages, [
            'role' => 'user',
            'content' => $question,
        ]);
        //dd($messages);

        $result = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
            'temperature' => 0.4,
            'max_tokens' => $maxToken,
        ]);

        $response = '';
        foreach ($result['choices'] as $choice) {
            $response .= $choice['message']['content'];
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
