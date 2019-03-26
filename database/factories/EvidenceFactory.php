<?php

use Faker\Generator as Faker;

$factory->define(App\Evidence::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 100),
        'location' => "Page " . $faker->numberBetween($min = 1, $max = 200),
        'type' => $faker->randomElement($array = array(
            'Summary',
            'Paraphrase',
            'Quote',
        )),
    ];
});
