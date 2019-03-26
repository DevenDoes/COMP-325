<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->user = create('App\User');
        $this->paper = create('App\Paper', [
            'user_id' => $this->user->id,
        ]);
    }

    /** @test */
    public function a_user_has_a_paper() {
        $this->assertInstanceOf('App\Paper', $this->user->papers->first());
    }

    /** @test */
    public function a_user_has_a_source() {
        $source = create('App\Source', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Source', $this->user->sources->first());
    }

    /** @test */
    public function a_user_has_evidence() {
        $source = create('App\Source', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $evidence = create('App\Evidence', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'source_id' => $source->id,
        ]);
        $this->assertInstanceOf('App\Evidence', $this->user->evidence->first());
    }

    /** @test */
    public function a_user_has_an_analysis() {
        $analysis = create('App\Analysis', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Analysis', $this->user->analyses->first());
    }

    /** @test */
    public function a_user_has_an_argument() {
        $argument = create('App\Argument', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Argument', $this->user->arguments->first());
    }

    /** @test */
    public function a_user_has_an_outline() {
        $outline = create('App\Outline', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Outline', $this->user->outlines->first());
    }

    /** @test */
    public function a_user_has_a_paragraph() {
        $outline = create('App\Outline', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $paragraph = create('App\Paragraph', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'outline_id' => $outline->id,
        ]);
        $this->assertInstanceOf('App\Paragraph', $this->user->paragraphs->first());
    }
}
