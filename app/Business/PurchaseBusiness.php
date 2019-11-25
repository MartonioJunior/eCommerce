<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
use App\Business\ProductBusiness;

class PurchaseBusiness {
	public static function listAll() {
		return Purchase::all();
	}

	public static function list($id) {
		return Purchase::where('id',$id)->get();
	}

	public static function create($client, $listProducts) {
		$purchase = new Purchase;
		$purchase->id = PurchaseBusiness::listAll()->count() + 1;
		$purchase->date_time = date('Y-m-d H:i:s');
		$purchase->buyer()->associate($client);
		$purchase->save();
		$array_products = [];
		foreach ($listProducts as $productData) {
			$id = (int)$productData["id"];
			$amount = (int)$productData["amount"];
			$product_list = ProductBusiness::list($id);
			foreach($product_list as $product) {
				if($product->amountStock >= $amount) {
					PurchaseBusiness::add($id, $purchase, $amount);
					$product->amountStock -= $amount;
					array_push($array_products, $product);
				} else {
					PurchaseBusiness::delete($id);
					return false;
				}
			}
		}
		foreach ($array_products as $product) {
			$product->save();	
		}
		$purchase->save();
		return $purchase;
	}

	public static function update($id, $newData) {
		Purchase::where('id',$id)->update($newData);
	}

	public static function delete($id) {
		$purchase = Purchase::where('id',$id)->take(1)->get();
		$purchase->delete();
	}

	public static function add($product, $toPurchase, $amount) {
		$toPurchase->products()->attach($product, ['amount' => $amount]);
	}

	public static function removeProduct($withID, $toPurchase) {
		$purchase->products()->detach($withID);
		$purchase->save();
	}
}

?>