<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\ProductBusiness;

class ProductController extends Controller
{
    public function cartProducts() {
    	$products = [];
    	$value = 0.0;
    	foreach ($products as $product) {
    		$value += $product->price;	
    	}

    	return view('cart.show', [
    		'products' => $products,
    		'totalValue' => $value
    	]);
    }

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
        var_dump($request->all());
        $categories = array_unique($request->input('category') ?? []);
        if ($id == -1) {
            $name = $request->input("product-1name");
            $price = $request->input("product-1price");
            $amountStock = $request->input("product-1amountStock");
            $description = $request->input("product-1description");
            $photo = $request->input("photoP-1");
            $product = ProductBusiness::create($name, $price, $amountStock, $description, $photo);
            foreach ($categories as $category) {
                if ($category != "-1") {
                    ProductBusiness::add((int)$category, $product);
                }
            }
            $id = $product->id;
        } else {
            $data = [
                'name' => $request->input("product".$id."name"),
                'price' => $request->input("product".$id."price"),
                'amountStock' => $request->input("product".$id."amountStock"),
                'description' => $request->input("product".$id."description"),
            ];
            $photo = $request->input("photoP".$id);
            if ($photo) {
                $data['photo'] = $photo;
            }
            $product = ProductBusiness::update($id, $data);
            $productCategories = $product->categories->map(function ($category) {
                return (string)$category->id;
            })->toArray();
            var_dump($productCategories);
            var_dump($categories);
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
}
