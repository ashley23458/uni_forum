<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'likes' => $faker->numberBetween(1, 100),
        'forum_id' => $faker->numberBetween(1, 6),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
