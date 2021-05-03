<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraphs(rand(3, 7), true),
        'user_id' => $faker->numberBetween(1,3),
        'question_id' => $faker->numberBetween(1,11),
        'votes_count' => $faker->numberBetween(1,7),

    ];
});
