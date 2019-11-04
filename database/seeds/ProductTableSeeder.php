<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = factory(Product::class, 10)
        			->create()
        			->each( function ($product) {
                $categories = Category::all()->shuffle()->take(3);
                $product->categories()->saveMany($categories);
            });
    }
}
