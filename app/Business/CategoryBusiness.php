<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class CategoryBusiness {
	public static function listAll() {
		return Category::all()->get();
	}

	public static function list($id) {
		return Category::where('id',$id)-get();
	}

	public static function create($description) {
		$category = new Category;

		$category->description = $description;

		$category->save();
		return $category
	}

	public static function update($id, $newData) {
		Category::where('id',$id)->update($newData);
	}

	public static function delete($id) {
		$category = Category::where('id',$id)->take(1)->get();
		$category->delete();
	}
}

?>