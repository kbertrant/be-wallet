<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id', 'receiver_id', 'code', 'amount', 'currency'
    ];

    public function sender() {
        return $this->hasOne(User::class, 'sender_id');
    }

    public function receiver() {
        return $this->hasOne(User::class, 'receiver_id');
    }
}
