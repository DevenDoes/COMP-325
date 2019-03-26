<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OutlineTest extends TestCase
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
    }

    /** @test */
    public function an_oultine_belongs_to_a_user() {
        $this->assertInstanceOf('App\User', $this->outline->user);
    }

    /** @test */
    public function an_outline_belongs_to_a_paper() {
        $this->assertInstanceOf('App\Paper', $this->outline->paper);
    }

    /** @test */
    public function an_outline_has_an_argument() {
        $argument = create('App\Argument', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->outline->arguments()->attach($argument->id, [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
        $this->assertInstanceOf('App\Argument', $this->outline->arguments->first());
    }

    /** @test */
    public function an_outline_has_paragraphs() {
        $paragraph = create('App\Paragraph', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'outline_id' => $this->outline->id,
        ]);
        $this->assertInstanceOf('App\Paragraph', $this->outline->paragraphs->first());
    }
}
