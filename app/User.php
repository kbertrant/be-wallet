<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'identifier', 'amount',
        'gender', 'birth', 'country', 'city', 'address',
        'email_token', 'confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_token'
    ];

    public function applications() {
        return $this->hasMany(Application::class, 'user_id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function deposits() {
        return $this->transactions()->where('type', Transaction::DEPOSIT);
    }

    public function withDrawls() {
        return $this->transactions()->where('type', Transaction::WITHDRAW);
    }
}
