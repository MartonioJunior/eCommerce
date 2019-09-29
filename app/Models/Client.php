<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends User
{
    //
    protected $table = "client";
    protected $primaryKey = "id";
    protected $guard = 'client';
    public $timestamps = false;
    protected $atributes = [
    	'address' => "",
    ];

    public function purchases() {
    	return $this->hasMany('App\Models\Purchase');
    }
}
