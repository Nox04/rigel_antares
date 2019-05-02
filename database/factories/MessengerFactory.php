<?php

use Faker\Generator as Faker;

$factory->define(App\Messenger::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'phone' => $faker->unique()->randomNumber($nbDigits = NULL),
        'pin' => $faker->unique()->randomNumber($nbDigits = 4),
        'enabled' => random_int(0, 1),
        'user_id' => 1,
    ];
});
