<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Purchase;
use App\Models\Client;
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

$factory->define(Purchase::class, function (Faker $faker) {
    return [
    	'client_id' => Client::all()->get(1),
        'date_time' => $faker->dateTimeInInterval($startDate = '-10 years', $interval = '+ 5 days', $timezone = null),
    ];
});
