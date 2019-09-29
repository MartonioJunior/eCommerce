<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $table = "purchase";
    protected $primaryKey = "id";
    protected $timestamps = false;
    const CREATED_AT = "date_time";

    public function buyer() {
    	return $this->belongsTo('App\Models\Client');
    }

    public function products() {
    	return $this->belongsToMany('App\Models\Product')
    				->using('App\Models\Purchase_Product')
    				->withPivot(['amount']);
    }
}
