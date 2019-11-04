<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
	        AdminTableSeeder::class,
	        ClientTableSeeder::class,
	        CategoryTableSeeder::class,
	        ProductTableSeeder::class,
	        PurchaseTableSeeder::class,
	    ]);
    }
}
