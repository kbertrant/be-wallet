<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const DEPOSIT = 'DEP';
    const WITHDRAW = 'WTD';

    const PENDING = "PENDING";
    const SUCCESS = "SUCCESS";
    const FAILED = "FAILED";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'user_id',
        'code',
        'amount',
        'currency',
        'status',
        'signature',
        'payment_method',
        'cel_phone_num',
        'cpm_phone_prefixe',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
