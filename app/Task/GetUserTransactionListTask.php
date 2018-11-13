<?php

namespace App\Task;

use App\Transaction;
use App\Transfer;
use App\Utils\Utils;
use Illuminate\Support\Facades\DB;

class GetUserTransactionListTask
{
    public function __construct()
    {

    }

    /**
     * @param int $userId
     *
     * @return array
     */
    public function run($userId) {
        $result = ['data' => []];

        $transactions = Transaction::where('user_id', '=', $userId)->orderBy('created_at', 'desc')->get();

        $count = 0;
        foreach ($transactions as $transaction) {
            $result['data'][] = [
              'code'            => $transaction->code,
              'amount'          => $transaction->amount,
              'date'            => $transaction->created_at->format('Y-m-d h:i:s'),
              'type'            => $transaction->type,
              'status'          => $transaction->status,
              'payment_method'  => $transaction->payment_method,
              'cel_phone_num'   => $transaction->cel_phone_num,
              'currency'        => $transaction->currency,
             ];
            $count++;
        }

        $result['draw'] = 1;
        $result['recordsTotal'] = $count;
        $result['recordsFiltered'] = $count;

        return $result;
    }
}