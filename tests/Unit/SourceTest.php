<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SourceTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->user = create('App\User');
        $this->paper = create('App\Paper', [
            'user_id' => $this->user->id,
        ]);
        $this->source = create('App\Source', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
        ]);
    }

    /** @test */
    public function a_source_belongs_to_a_user() {
        $this->assertInstanceOf('App\User', $this->source->user);
    }

    /** @test */
    public function a_source_belongs_to_a_paper() {
        $this->assertInstanceOf('App\Paper', $this->source->paper);
    }

    /** @test */
    public function a_source_has_evidence() {
        $evidence = create('App\Evidence', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'source_id' => $this->source->id,
        ]);
        $this->assertInstanceOf('App\Evidence', $this->source->evidence->first());
    }
}
