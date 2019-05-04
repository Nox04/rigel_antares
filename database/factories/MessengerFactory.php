<?php

use Faker\Generator as Faker;

$factory->define(App\Messenger::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'phone' => $faker->unique()->randomNumber($nbDigits = 9),
        'pin' => $faker->unique()->randomNumber($nbDigits = 4),
        'latitude' => $this->faker->latitude($min = 10.44, $max = 10.48),
        'longitude' => $this->faker->longitude($min = -73.23, $max = -73.28),
        'working' => random_int(0, 1),
        'enabled' => random_int(0, 1),
    ];
});
