<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        //'user_id' => $user->id,
        //'source_id' => $source->id,
        'summary' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
        'application' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
    ];
});
