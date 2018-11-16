<?php

namespace App\Task;

use App\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class GetPaymentStatusTask
{
    public function __construct()
    {

    }

    /**
     * @param Transaction $transaction
     *
     * @return string
     */
    public function run($transaction) {
        $signature = null;
        $siteId = env('CINEPAY_SITE_ID');
        $apiKey = env('CINEPAY_API_KEY');

        $options = [];
        $headers = ['Content-Type' =>  'application/x-www-form-urlencoded'];

        $options['form_params'] = [
            "cpm_site_id"           => $siteId,
            "cpm_trans_id"          => $transaction->code,
            "apikey"                => $apiKey
        ];

        $options['headers'] = $headers;

        try
        {
            $client = new Client($options);

            $response = $client->request('POST', 'https://api.cinetpay.com/v1/?method=checkPayStatus');

            $content = $response->getBody()->getContents();
            // Log::info(print_r($content, true));
            $data = \GuzzleHttp\json_decode($content);
            $result = $data->transaction;

            if($result->cpm_result === '00' && $result->cpm_amount === $transaction->amount && $result->signature === $transaction->signature) {
                return Transaction::SUCCESS;
            } else {
                return Transaction::FAILED;
            }

        }
        catch(ClientException $ex)
        {
            Log::error($ex->getMessage());
            return Transaction::FAILED;
        }
    }

}