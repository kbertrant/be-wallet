<?php

namespace App\Task;

use App\Transfer;
use App\User;
use App\Utils\Utils;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;

class TransferMoneyTask
{
    public function __construct()
    {

    }

    /**
     * @param User|Authenticatable $sender
     * @param User $receiver
     * @param int $amount
     *
     * @return array
     */
    public function run($sender, $receiver, $amount) {
        $data = ['code' => 200, 'message' => 'Transfer completed successfully !'];
        $result = false;

        DB::transaction(function() use($sender, $receiver, $amount, &$result) {
            DB::table('users')->where('id', $sender->id)->update(['amount' => ($sender->amount - $amount)]);

            DB::table('users')->where('id', $receiver->id)->update(['amount' => ($receiver->amount + $amount)]);

            $now = new \DateTime();

            DB::table('transfers')->insert([
                'sender_id'     => $sender->id,
                'receiver_id'   => $receiver->id,
                'code'          => $this->generateTransferCode(),
                'amount'        => $amount,
                'currency'      => 'XAF',
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);

            $result = true;
        });

        if(!$result) {
            $data['code'] = 400;
            $data['message'] = 'Error occured when executing the treatment ! Operation canceled !';
        }

        return $data;
    }

    private function generateTransferCode() {
        /** @var Transfer $lastTransfer */
        $lastTransfer = Transfer::orderBy('id', 'desc')->first();

        $maxId = is_null($lastTransfer) ? 1 : $lastTransfer->id + 1;

        $year = (new \DateTime())->format('y');

        return "BWT".$year.'TRF'.$maxId;
    }
}