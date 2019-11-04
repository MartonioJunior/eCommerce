<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductBusiness {
	public static function listAll() {
		return Product::all();
	}

	public static function listAllInStock() {
		return Product::where('amountStock', '>', 0)->get();
	}

	public static function list($id) {
		return Product::where('id', $id)->get();
	}

	public static function create($name, $price, $amountStock, $description, $photo) {
		$product = new Product;

		$product->name = $name;
		$product->price = $price;
		$product->amountStock = $amountStock;
		$product->description = $description;
		$product->photo = $photo ?? "/images/placeholder-product.jpg";	

		$product->save();
		return $product;
	}

	public static function update($id, $newData) {
		$product = Product::where('id', $id);
		$product->update($newData);
		return $product->first();
	}

	public static function delete($id) {
		$product = Product::find($id);
		$product->categories()->detach();
		$product->purchases()->detach();
		Product::destroy($id);
	}

	public static function add($category, $toProduct) {
		$toProduct->categories()->attach($category);
		$toProduct->save();
	}

	public static function remove($withID, $toProduct) {
		$toProduct->categories()->detach($withID);
		$toProduct->save();
	}
}

?>