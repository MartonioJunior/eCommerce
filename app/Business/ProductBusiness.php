<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductBusiness {
	public static function listAll() {
		return Product::all()->get();
	}

	public static function list($id) {
		return Product::where('id',$id)-get();
	}

	public static function create($name, $price, $amountStock, $description, $photo) {
		$product = new Product;

		$product->name = $name;
		$product->price = $price;
		$product->amountStock = $amountStock;
		$product->description = $description;
		$product->photo = $photo;

		$product->save();
		return $product
	}

	public static function update($id, $newData) {
		Product::where('id',$id)->update($newData);
	}

	public static function delete($id) {
		$product = Product::where('id',$id)->take(1)->get();
		$product->delete();
	}

	public static function add($category, $toProduct) {
		$product->categories()->attach($category);
	}

	public static function removeCategory($withID, $toProduct) {
		$product->categories()->detach($withID);
	}
}

?>