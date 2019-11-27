<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\ProductBusiness;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function productsInStock() {
    	return view('welcome', [
    		'products' => ProductBusiness::listAllInStock()
    	]);
    }

    public function allProducts() {
    	return view('product.show', [
    		'products' => ProductBusiness::listAll()
    	]);
    }

    public function save(Request $request, $id) {
        $categories = array_unique($request->input('category') ?? []);
        if ($id == -1) {
            $name = $request->input("product-1name");
            $price = $request->input("product-1price");
            $amountStock = $request->input("product-1amountStock");
            $description = $request->input("product-1description");
            $photo = $request->file("photoP".$id);
            $product = ProductBusiness::create($name, $price, $amountStock, $description);
            foreach ($categories as $category) {
                if ($category != "-1") {
                    ProductBusiness::add((int)$category, $product);
                }
            }
            $id = $product->id;
            $data = [];
            if ($photo) {
                $data['photo'] = $this->imageUploadPost($photo, $id);
                ProductBusiness::update($id, $data);
            }
        } else {
            $data = [
                'name' => $request->input("product".$id."name"),
                'price' => $request->input("product".$id."price"),
                'amountStock' => $request->input("product".$id."amountStock"),
                'description' => $request->input("product".$id."description"),
            ];
            $photo = $request->file("photoP".$id);
            if ($photo) {
                $data['photo'] = $this->imageUploadPost($photo, $id);
            }
            $product = ProductBusiness::update($id, $data);
            $productCategories = $product->categories->map(function ($category) {
                return (string)$category->id;
            })->toArray();
            foreach (array_diff($productCategories, $categories) as $category) {
                ProductBusiness::remove((int)$category, $product);
            }
            foreach (array_diff($categories, $productCategories) as $category) {
                if ($category != "-1") {
                    ProductBusiness::add((int)$category, $product);
                }
            }
        }
    	return redirect("admin/profile#productTable");
    }

    public function delete($id) {
        if ($id != -1) {
            ProductBusiness::delete($id);
        }
        return redirect('admin/profile#productTable');
    }

    public function imageUploadPost($photo, $id) {
        $imageName = "photoP".$id.'.'.$photo->getClientOriginalExtension();
        $photo->storeAs('public', $imageName);
        return asset(Storage::url($imageName));
    }
}
