<?php

use Faker\Generator as Faker;

$factory->define(App\Outline::class, function (Faker $faker) {
    return [
        'thesis' => $faker->text($maxNbChars = 100),
    ];
});
