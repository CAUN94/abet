<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
		'name' => $faker->numberBetween(1,9),
		'description' => $faker->sentence(),
		'indicator_id' => function () {
            return factory(App\Indicator::Class)->create()->id;
        },

    ];
});
