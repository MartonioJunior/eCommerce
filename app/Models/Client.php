<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $table = "client";
    protected $primaryKey = "id";
    protected $guard = 'client';
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password', 'login', 'address',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function purchases() {
    	return $this->hasMany('App\Models\Purchase');
    }
}
