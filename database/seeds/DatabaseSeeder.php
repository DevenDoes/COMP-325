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
        //Evidence count
        $evidenceCount = 0;
        //Analyses count
        $analysisCount = 0;
        //Argument count
        $argumentCount = 0;
        //Create users
        factory(App\User::class, 1)->create()->each(function($user) use($evidenceCount, $analysisCount, $argumentCount) {
            //Create papers
            factory(App\Paper::class, rand(3,5))->create([
                'user_id' => $user->id,
            ])->each(function($paper) use($user, $evidenceCount, $analysisCount, $argumentCount) {
                //Create sources
                factory(App\Source::class, rand(5,7))->create([
                    'user_id' => $user->id,
                    'paper_id' => $paper->id,
                ])->each(function($source) use($user, $paper, $evidenceCount) {
                    //Create evidence
                    factory(App\Evidence::class, rand(3,10))->create([
                        'user_id' => $user->id,
                        'paper_id' => $paper->id,
                        'source_id' => $source->id,
                    ])->each(function() use($evidenceCount) {
                        $evidenceCount++;
                    });
                });
                //Create analyses
                factory(App\Analysis::class, rand(7,11))->create([
                    'user_id' => $user->id,
                    'paper_id' => $paper->id,
                ])->each(function($analysis) use($user, $paper, $evidenceCount, $analysisCount) {
                    $analysisCount++;
                    //Random number of evidence to associate
                    $randNum = rand(1,4);
                    //Associate analysis to evidence
                    for($i = 0; $i < $randNum; $i++) {
                        $analysis->evidence()->attach(
                            $paper->evidence()->inRandomOrder()->first()->id,
                            [
                                'user_id' => $user->id,
                                'paper_id' => $paper->id
                            ]
                        );
                    }
                });
                //Create arguments
                factory(App\Argument::class, rand(3,5))->create([
                    'user_id' => $user->id,
                    'paper_id' => $paper->id,
                ])->each(function($argument) use($user, $paper, $analysisCount, $argumentCount) {
                    $argumentCount++;
                    //Random number of analyses to associate
                    $randNum = rand(2,5);
                    //Associate argument to analyses
                    for($i = 0; $i < $randNum; $i++) {
                        $argument->analyses()->attach(
                            $paper->analyses()->inRandomOrder()->first()->id,
                            [
                                'user_id' => $user->id,
                                'paper_id' => $paper->id
                            ]
                        );
                    }
                });
                //Create outlines
                factory(App\Outline::class, rand(2,3))->create([
                    'user_id' => $user->id,
                    'paper_id' => $paper->id,
                ])->each(function($outline) use($user, $paper, $argumentCount) {
                    //Random number of arguments to associate
                    $randNum = rand(1,3);
                    //Associate outline to arguments
                    for($i = 0; $i < $randNum; $i++) {
                        $outline->arguments()->attach(
                            $paper->arguments()->inRandomOrder()->first()->id,
                            [
                                'user_id' => $user->id,
                                'paper_id' => $paper->id
                            ]
                        );
                    }
                    //Create paragraphs
                    factory(App\Paragraph::class, rand(3,6))->create([
                        'user_id' => $user->id,
                        'paper_id' => $paper->id,
                        'outline_id' => $outline->id,
                    ])->each(function($paragraph) use($user, $paper, $outline) {
                        //Load random argument from outline
                        $argument = $outline->arguments()->inRandomOrder()->first();
                        //Associate paragraph to argument from outline
                        $paragraph->argument_id = $argument->id;
                        //Random number of analyses from associated argument
                        $randNum = rand(1, $argument->analyses()->count());
                        //Associate paragraph to analyses from associated argument
                        for($i = 0; $i < $randNum; $i++) {
                            $paragraph->analyses()->attach(
                                $argument->analyses()->inRandomOrder()->first()->id,
                                [
                                    'user_id' => $user->id,
                                    'paper_id' => $paper->id,
                                    'outline_id' => $outline->id,
                                    'argument_id' => $argument->id
                                ]
                            );
                        }
                    });
                });
            });
        });
    }
}
