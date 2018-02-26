<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'title' => $faker->sentence,
        'body' => $faker->text
    ];
});


// $table->increments('id');
//             $table->integer('user_id');
//             $table->string('title');
//             $table->string('slug')->nullable($value = true);
//             $table->text('body');
//             $table->timestamps();