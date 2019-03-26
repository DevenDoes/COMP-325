<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EvidenceTest extends TestCase
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
        $this->evidence = create('App\Evidence', [
            'user_id' => $this->user->id,
            'paper_id' => $this->paper->id,
            'source_id' => $this->source->id,
        ]);
    }

    /** @test */
    public function evidence_belongs_to_a_user() {
        $this->assertInstanceOf('App\User', $this->evidence->user);
    }

    /** @test */
    public function evidence_belongs_to_a_paper() {
        $this->assertInstanceOf('App\Paper', $this->evidence->paper);
    }

    /** @test */
    public function evidence_belongs_to_a_source() {
        $this->assertInstanceOf('App\Source', $this->evidence->source);
    }
}
