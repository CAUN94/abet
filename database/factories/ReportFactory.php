<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
    	'course_id' => function () {
            return factory(App\Course::Class)->create()->id;
        },
		'category_id' => function () {
            return factory(App\Category::Class)->create()->id;
        },
        'user_id' =>1,
		'MeasurementInstrument' => null,
		'AssessmentMethodDetail' => null,
		'MaxScore' => null,
		'MinScore' => null,
		'ProfessorTeam' => null,
		'Result' => null,
		'PurposeMeasure' => null,
		'Results' => null,
		'ImproceScores' => null,
		'Expected' => null,
		'Proposal' => null,
    ];
});
