<?php

namespace App\Task;

use App\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class GetCinePaySignatureTask
{
    public function __construct()
    {

    }

    /**
     * @param Transaction $transaction
     *
     * @return array
     */
    public function run($transaction) {
        $result = ['code' => 200, 'message' => '', 'signature' => null];

        $signature = null;
        $siteId = env('CINEPAY_SITE_ID');
        $apiKey = env('CINEPAY_API_KEY');

        $options = [];
        $headers = ['Accept' =>  'application/json'];

        $options['json'] = [
            "cpm_amount"            => $transaction->amount,
            "cpm_currency"          => "CFA",
            "cpm_site_id"           => $siteId,
            "cpm_trans_id"          => $transaction->code,
            "cpm_trans_date"        => $transaction->created_at->format('Y-m-d h:i:s'),
            "cpm_payment_config"    => "SINGLE",
            "cpm_page_action"       => "PAYMENT",
            "cpm_version"           => "V1",
            "cpm_language"          => "fr",
            "cpm_designation"       => $transaction->type,
            "cpm_custom"            => $transaction->code."|".$transaction->amount,
            "apikey"                => $apiKey
        ];

        Log::info(print_r($options['json'], true));
        $options['headers'] = $headers;

        try
        {
            $client = new Client($options);

            $response = $client->request('POST', 'https://api.cinetpay.com/v1/?method=getSignatureByPost');

            if($response->getStatusCode() === 200){
                $content = $response->getBody()->getContents();
                Log::info(print_r($content, true));
                $data = \GuzzleHttp\json_decode($content);

                if(isset($data->status)) {
                    $result['code'] = 400;
                    $result['message'] = $data->status->message;
                } else {
                    $result['signature'] = $data;
                }
            }

        }
        catch(ClientException $ex)
        {
            Log::error($ex->getMessage());
            $result['code'] = 400;
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

}