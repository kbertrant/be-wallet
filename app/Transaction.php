<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const DEPOSIT = 'DEP';
    const WITHDRAW = 'WTD';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'user_id', 'code', 'amount', 'currency'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
