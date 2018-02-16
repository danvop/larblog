<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence(3, true),
        'body' => $faker->text(200),
        'completed' => $faker->boolean
    ];
});
