<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $table = "purchase";
    protected $primaryKey = "id";
    public $timestamps = false;
    const CREATED_AT = "date_time";

    public function buyer() {
    	return $this->belongsTo('App\Models\Client','client_id','id');
    }

    public function products() {
    	return $this->belongsToMany('App\Models\Product')
    				->using('App\Models\Purchase_Product')
    				->withPivot(['amount']);
    }

    public function getTotalValue() {
        $total = 0.0;
        foreach ($this->products as $product) {
            $price = (float)$product->price;
            $total += ($price * $product->pivot->amount);
        }
        return $total;
    }

    public function dateOfPurchase() {
        return $this->CREATED_AT->format('d/m/Y');
    }
}
