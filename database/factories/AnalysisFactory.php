<?php

use Faker\Generator as Faker;

$factory->define(App\Analysis::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 100),
    ];
});
