<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Times;
use Faker\Generator as Faker;

$factory->define(Times::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'clocked_in' => $faker->dateTime,
        'clocked_out' => $faker->dateTime,
    ];
});
