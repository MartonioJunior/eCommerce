<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "product";
    protected $primaryKey = "id";
    protected $timestamps = false;
    protected $atributes = [
    	'name' => "",
    	'price' => 0.0,
    	'amountStock' => 0,
    	'description' => "",
    	'photo' => "",
    ];

    public function purchases() {
    	return $this->belongsToMany('App\Models\Purchase')
    				->using('App\Models\Purchase_Product')
    				->withPivot(['amount']);
    }

    public function categories() {
    	return $this->belongsToMany('App\Models\Category','category_product');
    }
}
