<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
        'amountStock' => $faker->numberBetween($min = 0, $max = 100),
        'description' => $faker->text($maxNbChars = 200),
        'photo' => $faker->imageUrl(600, 600, 'food'),
    ];
});
