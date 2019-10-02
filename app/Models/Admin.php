<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admin";
    protected $primaryKey = "id";
    protected $guard = 'admin';
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password', 'login',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
