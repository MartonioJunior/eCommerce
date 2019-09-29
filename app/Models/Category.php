<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category";
    protected $primaryKey = "id";
    protected $timestamps = false;
    protected $atributes = [
    	'description' => ""
    ];

    public function products() {
    	return $this->belongsToMany('App\Models\Product', 'category_product');
    }
}
