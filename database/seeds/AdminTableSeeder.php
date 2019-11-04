<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
        	'name' => 'admin',
        	'email' => 'admin@ecommerce.com',
        	'login' => 'admin',
        	'password' => '$2y$10$wus.bHHpqa1QHyspoJ3hqOICYSPRbM1sclRyJ8lK4oNEZ40TpS3p6' //admin
        ]);
    }
}
