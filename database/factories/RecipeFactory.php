<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'description' => $faker->realText(50),
        'products' => $faker->realText(50),
        'recipe' => $faker->realText(50),
    ];
});
