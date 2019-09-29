<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    //
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $guard = 'admin';
    public $timestamps = false;
}
