<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParagraphTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->user = create('App\User');
        $this->paper = create('App\Paper', [
            'user_id' => $this->user->id,
        ]);
        $this->outline = create('App\Outline', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->paragraph = create('App\Paragraph', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'outline_id' => $this->outline->id,
        ]);
    }

    /** @test */
    public function a_paragraph_belongs_to_a_user() {
        $this->assertInstanceOf('App\User', $this->paragraph->user);
    }

    /** @test */
    public function a_paragraph_belongs_to_a_paper() {
        $this->assertInstanceOf('App\Paper', $this->paragraph->paper);
    }

    /** @test */
    public function a_paragraph_belongs_to_an_outline() {
        $this->assertInstanceOf('App\Outline', $this->paragraph->outline->first());
    }

    /** @test */
    public function a_paragraph_has_an_analysis() {
        $argument = create('App\Argument', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $analysis = create('App\Analysis', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->paragraph->analyses()->attach($analysis->id, [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'outline_id' => $this->outline->id,
            'argument_id' => $argument->id,
        ]);
        $this->assertInstanceOf('App\Analysis', $this->paragraph->analyses->first());
    }
}
