<?php

use Faker\Generator as Faker;

$factory->define(App\Argument::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 100),
    ];
});
