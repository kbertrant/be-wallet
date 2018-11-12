<?php

namespace App\Task;

use App\Transaction;
use App\Utils\Utils;

class CreateTransactionTask
{
    public function __construct()
    {

    }

    /**
     * @param string $type
     * @param int $user_id
     * @param int $amount
     *
     * @return Transaction
     */
    public function run($type, $user_id, $amount) {
        $now = new \DateTime();

        /** @var Transaction $transaction */
        $transaction = Transaction::create([
            'user_id'       => $user_id,
            'code'          => $this->generateTransactionCode(),
            'type'          => $type,
            'status'        => Transaction::PENDING,
            'amount'        => $amount,
            'currency'      => 'XAF',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        return $transaction;
    }

    private function generateTransactionCode() {
        /** @var Transaction $lastTransaction */
        $lastTransaction = Transaction::orderBy('id', 'desc')->first();

        $maxId = is_null($lastTransaction) ? 1 : $lastTransaction->id + 1;

        $year = (new \DateTime())->format('y');

        return "BWT".$year.'TSC'.Utils::FormatId($maxId);
    }
}