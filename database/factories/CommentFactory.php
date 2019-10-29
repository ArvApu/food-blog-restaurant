<?php

/** @var Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(rand(10, 200)),
        'recipe_id' => function () {
            return App\Recipe::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        }
    ];
});
