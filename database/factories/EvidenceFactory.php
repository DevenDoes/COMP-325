<?php

use Faker\Generator as Faker;

$factory->define(App\Evidence::class, function (Faker $faker) {
    return [
        //'user_id' => $user->id,
        //'insight_id' => $insight->id,
        'quote' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'location' => $faker->numerify('Page ##'),
    ];
});
