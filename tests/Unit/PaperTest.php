<?php

namespace Tests\Una_paper;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PaperTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->user = create('App\User');
        $this->paper = create('App\Paper', ['user_id' => $this->user->id]);
    }

    /** @test */
    public function a_paper_belongs_to_a_user() {
        $this->assertInstanceOf('App\User', $this->paper->user);
    }

    /** @test */
    public function a_paper_has_a_source() {
        $source = create('App\Source', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Source', $this->paper->sources->first());
    }

    /** @test */
    public function a_paper_has_evidence() {
        $source = create('App\Source', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $evidence = create('App\Evidence', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'source_id' => $source->id,
        ]);
        $this->assertInstanceOf('App\Evidence', $this->paper->evidence->first());
    }

    /** @test */
    public function a_paper_has_an_analysis() {
        $analysis = create('App\Analysis', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Analysis', $this->paper->analyses->first());
    }

    /** @test */
    public function a_paper_has_an_argument() {
        $argument = create('App\Argument', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Argument', $this->paper->arguments->first());
    }

    /** @test */
    public function a_paper_has_an_outline() {
        $outline = create('App\Outline', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Outline', $this->paper->outlines->first());
    }

    /** @test */
    public function a_paper_has_a_paragraph() {
        $outline = create('App\Outline', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $paragraph = create('App\Paragraph', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'outline_id' => $outline->id,
        ]);
        $this->assertInstanceOf('App\Paragraph', $this->paper->paragraphs->first());
    }
}
