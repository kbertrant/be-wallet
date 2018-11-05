<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'url', 'client_id', 'token', 'success_url', 'cancel_url',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
