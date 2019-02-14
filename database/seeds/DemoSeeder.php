<?php

use Illuminate\Database\Seeder;

Use App\User;

class DemoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create users
        $user = App\User::all()->first();
        $sources = $user->sources()->get();
        $sources->each(function($source) use($user) {
            // For each source create insights
            factory(App\Insight::class, rand(6,11))->create([
                'user_id' => $user->id,
                'source_id' => $source->id,
            ])->each(function($insight) use($user) {
                // For each insight create evidence
                factory(App\Evidence::class, rand(2,5))->create([
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
    }
}
