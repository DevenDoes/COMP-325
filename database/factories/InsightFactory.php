<?php

use Faker\Generator as Faker;

$factory->define(App\Insight::class, function (Faker $faker) {
    return [
        //'user_id' => $user->id,
        //'source_id' => $source->id,
        'idea' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
