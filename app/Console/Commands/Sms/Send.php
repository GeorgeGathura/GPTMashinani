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
    protected $signature = 'sms:send {message} {recipient}';

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
        try{
            $this->line('Initalizing Sms distribution...');
            $body=[
                "message"=>$this->argument('message'),
                "apiKey"=>env('TAIFA_API_KEY'),
                "service_name"=> "TaifaBulkService",
                "recepients"=>$this->argument('recipient')
            ];
            //$this->line($body);
            $response = Http::retry(3, 500)->post('https://beta.taifamobile.co.ke/public/api/sms',$body);
            $this->info($response);
            if($response['status']!="00")
                $this->warn("Incorrect Status Code");

            $response->throwif($response['status']!="00");
        }catch(ConnectionException $e){
            //notify admin taifa mobile is down
            //set all sms as jobs for later
            $this->error('A connection error occured');
        } catch(RequestException $e){
            //
            /*
            00 - Success
            01 - Failed
            97 - No enough funds
            98 - Service not found
            99 - Missing required details
            */
            $this->error('A request error occured');

        }


    }
}
