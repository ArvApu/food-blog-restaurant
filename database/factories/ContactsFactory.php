<?php

/** @var Factory $factory */

use App\Contact;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'manager' => $faker->name,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
    ];
});
