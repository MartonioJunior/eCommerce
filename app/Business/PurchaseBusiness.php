<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
use App\Business\ProductBusiness;

class PurchaseBusiness {
	public static function listAll() {
		return Purchase::all()->get();
	}

	public static function list($id) {
		return Purchase::where('id',$id)-get();
	}

	public static function create($client, $listProducts) {
		$purchase = new Purchase;
		for ($productAmount as $productData) {
			$this->add($productData["id"], $this, $productData["amount"]);
		}
		$purchase->buyer()->attach($client);
		$purchase->save();
		return $purchase
	}

	public static function update($id, $newData) {
		Purchase::where('id',$id)->update($newData);
	}

	public static function delete($id) {
		$purchase = Purchase::where('id',$id)->take(1)->get();
		$purchase->delete();
	}

	public static function add($product, $toPurchase, $amount) {
		$purchase->products()->attach($product,['amount' => $amount]);
		$purchase->save();
	}

	public static function removeProduct($withID, $toPurchase) {
		$purchase->products()->detach($withID);
		$purchase->save();
	}
}

?>