<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Indicator;
use Faker\Generator as Faker;

$factory->define(Indicator::class, function (Faker $faker) {
    return [
		'name' => $faker->numberBetween(1,6),
		'description' => $faker->sentence(),
    ];
});
