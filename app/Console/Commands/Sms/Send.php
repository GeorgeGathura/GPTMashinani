<?php

namespace App\Console\Commands\Sms;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class Send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send {recipient} {linkId} {message} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an SMS to TaifaMobile';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $finalStatus = '';
        $messageId = $this->argument('linkId');
        $systemStatus = 1;
        try {
            $this->line('Initalizing Sms distribution...');
            $body = [
                'message' => $this->argument('message'),
                'apiKey' => env('TAIFA_API_KEY'),
                'service_name' => '23348_chat_mtaani_Ksh1_PerSMS',
                'linkId' => $messageId,
            ];

            //$this->line($body);
            Http::retry(3, 500)->post('https://beta.taifamobile.co.ke/public/api/replysms', $body);

            // $finalStatus = $response['status'].' - '.$response['statusDescription'];
            // $this->info($response);
            // if ($response['status'] != '00') {
            //     $this->warn('Incorrect Status Code');
            // }
            // $response->throwif($response['status'] != '00');

        } catch (ConnectionException $e) {
            //notify admin taifa mobile is down
            //set all sms as jobs for later
            $finalStatus = '01 - FAILED';
            $this->error('A connection error occured');
            $systemStatus = 0;
        } catch (RequestException $e) {
            //
            /*
            00 - Success
            01 - Failed
            97 - No enough funds
            98 - Service not found
            99 - Missing required details
            */
            // $finalStatus = '01 - FAILED';
            // $systemStatus = 0;
            $this->error('A request error occured');
        }
    }
}
