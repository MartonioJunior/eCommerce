<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Business\ProductBusiness;
use App\Business\PurchaseBusiness;

class PurchaseController extends Controller
{
	public function cartProducts() {
    	$products_cookie = PurchaseController::getCookies();
    	$products = [];
    	$value = 0.0;
    	foreach ($products_cookie as $product_data) {
    		$id = $product_data->id;
    		foreach (ProductBusiness::list($id) as $product) {
    			$product->currentAmount = $product_data->amount;
    			array_push($products, (clone $product));
    			$price = $product->price;
    			$value += ($product->currentAmount * $price);
    		}
    	}
    	return view('cart.show', [
    		'products' => $products,
    		'totalValue' => $value
    	]);
    }

	public function add(Request $request, $id, $amount) {
		$product_array = PurchaseController::getCookies();
		$products = ProductBusiness::list($id);
		foreach($products as $product) {
			$product_data = ['id' => $product->id, 'amount' => $amount];
			array_push($product_array, $product_data);
	 		$array_json = json_encode($product_array);
 		}
 		Cookie::queue('cart', $array_json, 450000);
 		return redirect('/cart');
	}

    public function save(Request $request) {
    	$product_array = getCookies();
    	// Check if it is empty
    	PurchaseBusiness::create(Auth::guard('client')->user(), $product_array);
    	removeAllCookies();
    	return redirect("/");
    }

    public function delete(Request $request, $id) {
    	$product_array = getCookies();
    }

    public function getCookies() {
    	if ($cookie_data = Cookie::get('cart')) {
            if(!is_array($cookie_data))
            {
                $data = [];
                $data[] = $cookie_data;
            } else {
                $data = $cookie_data;
            }
            return json_decode($cookie_data);
        }
        return [];
    }

    public function removeAllCookies() {
    	response()->withCookie(Cookie::forget('cart'));
    }
}
