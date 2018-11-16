<?php

namespace App\Task;

use App\Transfer;

class GetUserTransferListTask
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
        $result = ['total' => 0, 'sent' => 0, 'received' => 0, 'data' => []];

        /*$transfers = DB::table('transfers')
            ->where('sender_id', $userId)
            ->orWhere(['receiver_id' => $userId])
            ->orderByDesc('created_at')
            ->get();*/

        $transfers = Transfer::where('sender_id', '=', $userId)->orWhere('receiver_id', '=', $userId)->orderBy('created_at', 'desc')->get();
        $sent = 0;
        $received = 0;

        foreach ($transfers as $transfer) {
            $type = 'sent';
            if($transfer->receiver_id == $userId) {
                $type = 'received';
                $received++;
            } else {
                $sent++;
            }

            $result['data'][] = [
              'code'        => $transfer->code,
              'amount'      => $transfer->amount,
              'date'        => $transfer->created_at->format('Y-m-d h:i:s'),
              'type'        => $type,
              'sender_id'   => $transfer->sender_id,
              'sender'      => $transfer->sender->name,
              'receiver_id' => $transfer->receiver_id,
              'receiver'    => $transfer->receiver->name,
              'currency'    => $transfer->currency,
             ];
        }

        $total = $sent + $received;

        $result['received'] = $received;
        $result['sent'] = $sent;
        $result['total'] = $total;
        $result['draw'] = 1;
        $result['recordsTotal'] = $total;
        $result['recordsFiltered'] = $total;

        return $result;
    }
}