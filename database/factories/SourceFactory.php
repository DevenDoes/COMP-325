<?php

use Faker\Generator as Faker;

$factory->define(App\Source::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'authors' => $faker->name(),
        'location' => $faker->url(),
        'type' => $faker->randomElement($array = array(
            'Primary',
            'Secondary',
        )),
        'medium' => $faker->randomElement($array = array(
            'Blog',
            'Book',
            'Film',
            'Interview',
            'News Article',
            'Other',
            'Scholarly Article',
        )),
    ];
});
