<?php

use Faker\Generator as Faker;

$factory->define(App\Paragraph::class, function (Faker $faker) {
    return [
        'topic' => $faker->text($maxNbChars = 100),
    ];
});
