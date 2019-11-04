<?php

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Client;

class PurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purchases = factory(Purchase::class, 50)->create()->each(function ($purchase) {
            $products = Product::all()->shuffle()->take(5);
			$pivotData = array_fill(0, $products->count(), ['amount' => rand(1, 20)]);
			$syncData  = array_combine($products->pluck('id')->all(), $pivotData);
	        $purchase->products()->sync($syncData);
            $client = Client::all()->shuffle()->first();
            $purchase->buyer()->associate($client->id);
            $purchase->save();
	    });
    }
}
