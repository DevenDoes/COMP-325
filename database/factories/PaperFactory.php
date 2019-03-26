<?php

use Faker\Generator as Faker;

$factory->define(App\Paper::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'course' => $faker->randomElement($array = array(
            'ENGL 105',
            'GEOG 130',
            'MATH 232',
            'COMP 411',
            'COMP 325',
        )),
        'style' => $faker->randomElement($array = array(
            'APA',
            'CSE',
            'MLA',
        )),
        'prompt' => $faker->text($maxNbChars = 250),
    ];
});
