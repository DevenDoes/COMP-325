<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create users
        factory(App\User::class, 10)->create()->each(function($user) {
            // For each user create sources
            factory(App\Source::class, 10)->create([
                'user_id' => $user->id,
            ])->each(function($source) use($user) {
                // For each source create insights
                factory(App\Insight::class, 5)->create([
                    'user_id' => $user->id,
                    'source_id' => $source->id,
                ])->each(function($insight) use($user) {
                    // For each insight create evidence
                    factory(App\Evidence::class, 2)->create([
                        'user_id' => $user->id,
                        'insight_id' => $insight->id,
                    ]);
                });
                // For each source create reviews
                factory(App\Review::class, 1)->create([
                    'user_id' => $user->id,
                    'source_id' => $source->id,
                ]);
            });
        });
    }
}
