<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnalysisTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->user = create('App\User');
        $this->paper = create('App\Paper', [
            'user_id' => $this->user->id,
        ]);
        $this->analysis = create('App\Analysis', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
    }

    /** @test */
    public function an_analysis_belongs_to_a_user() {
        $this->assertInstanceOf('App\User', $this->analysis->user);
    }

    /** @test */
    public function an_analysis_belongs_to_a_paper() {
        $this->assertInstanceOf('App\Paper', $this->analysis->paper);
    }

    /** @test */
    public function an_analysis_has_evidence() {
        $source = create('App\Source', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $evidence = create('App\Evidence', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'source_id' => $source->id,
        ]);
        $this->analysis->evidence()->attach($evidence->id, [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Evidence', $this->analysis->evidence->first());
    }

    /** @test */
    public function an_analysis_belongs_to_an_argument() {
        $argument = create('App\Argument', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->analysis->arguments()->attach($argument->id, [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Argument', $this->analysis->arguments->first());
    }

    /** @test */
    public function an_analysis_belongs_to_a_paragraph() {
        $argument = create('App\Argument', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $outline = create('App\Outline', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $paragraph = create('App\Paragraph', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'outline_id' => $outline->id,
        ]);
        $this->analysis->paragraphs()->attach($paragraph->id, [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'outline_id' => $outline->id,
            'argument_id' => $argument->id,
        ]);
        $this->assertInstanceOf('App\Paragraph', $this->analysis->paragraphs->first());
    }
}
