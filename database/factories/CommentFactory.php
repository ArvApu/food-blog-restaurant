<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(rand(10, 200)),
        'recipe_id' => function () {
            return App\Models\Recipe::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return App\Models\User::inRandomOrder()->first()->id;
        }
    ];
});
