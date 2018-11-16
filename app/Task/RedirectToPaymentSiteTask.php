<?php

namespace App\Task;

use App\Transaction;

class RedirectToPaymentSiteTask
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
        $result = ['code' => 200, 'message' => '', 'signature' => null];

        $signature = null;
        $siteId = env('CINEPAY_SITE_ID');
        $apiKey = env('CINEPAY_API_KEY');

        $baseUrl= 'https://secure.cinetpay.com?';
        $appUrl = env('APP_URL').'/transactions';

        $params = [
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
            "apikey"                => $apiKey,
            "signature"             => $transaction->signature,
            "notify_url"            => $appUrl.env('APP_NOTIFY_URL'),
            "success_url"           => $appUrl.env('APP_SUCCESS_URL'),
            "cancel_url"            => $appUrl.env('APP_CANCEL_URL'),
        ];

        $queryParams = '';

        $count = 0;
        foreach ($params as $key => $value) {
            $queryParams .= ($count == 0 ? '' : '&').$key.'='.$value;
            $count++;
        }

        return $baseUrl.$queryParams;
    }
}