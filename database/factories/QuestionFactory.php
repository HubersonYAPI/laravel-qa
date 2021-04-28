<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5,10), ".")),
        'body' => $faker->paragraph(rand(3,7), true),
        'user_id' => $faker->numberBetween(1,3),
        'views' => rand(0, 10),
        'votes' => rand(-3, 10),
    ];
});
