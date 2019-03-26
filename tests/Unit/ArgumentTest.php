<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArgumentTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->user = create('App\User');
        $this->paper = create('App\Paper', [
            'user_id' => $this->user->id,
        ]);
        $this->argument = create('App\Argument', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
    }

    /** @test */
    public function an_argument_belongs_to_a_user() {
        $this->assertInstanceOf('App\User', $this->argument->user);
    }

    /** @test */
    public function an_argument_belongs_to_a_paper() {
        $this->assertInstanceOf('App\Paper', $this->argument->paper);
    }

    /** @test */
    public function an_argument_has_an_analysis() {
        $analysis = create('App\Analysis', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->argument->analyses()->attach($analysis->id, [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Analysis', $this->argument->analyses->first());
    }

    /** @test */
    public function an_argument_belongs_to_an_outline() {
        $outline = create('App\Outline', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->argument->outlines()->attach($outline->id, [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Outline', $this->argument->outlines->first());
    }
}
