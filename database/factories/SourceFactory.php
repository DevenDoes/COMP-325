<?php

use Faker\Generator as Faker;

$factory->define(App\Source::class, function (Faker $faker) {
    return [
        //'user_id' => $user->id,
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'author' => $faker->name($gender = null),
        'location' => $faker->url(),
    ];
});
