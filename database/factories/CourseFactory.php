<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
		'code' => $faker->numberBetween(200,230)."-".$faker->word(),
		'name' => $faker->word(2),
		'year' => 2020,
		'semester' => $faker->numberBetween(1,2),
    ];
});
