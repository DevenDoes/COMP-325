<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateEvidenceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_create_evidence() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $evidence = raw('App\Evidence', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
            'source_id' => $source->id,
        ]);
        $response = $this->json('POST', $source->path() . '/evidence', $evidence);
        $response->assertStatus(401);
        $this->assertDatabaseMissing('evidence', $evidence);
    }

    /** @test */
    public function an_authenticated_user_cannot_create_evidence_for_another_users_paper() {
        $this->signIn();
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $evidence = raw('App\Evidence', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
            'source_id' => $source->id,
        ]);
        $response = $this->json('POST', $source->path() . '/evidence', $evidence);
        $response->assertStatus(403);
        $this->assertDatabaseMissing('evidence', $evidence);
    }

    /** @test */
    public function an_authenticated_user_cannot_create_evidence_for_another_users_source() {
        $this->signIn();
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $evidence = raw('App\Evidence', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
            'source_id' => $source->id,
        ]);
        $response = $this->json('POST', $source->path() . '/evidence', $evidence);
        $response->assertStatus(403);
        $this->assertDatabaseMissing('evidence', $evidence);
    }

    /** @test */
    public function an_authenticated_user_can_create_evidence() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = create('App\Source', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $evidence = raw('App\Evidence', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
            'source_id' => $source->id,
        ]);
        $response = $this->json('POST', $source->path() . '/evidence', $evidence);
        $response->assertStatus(200);
        $this->assertDatabaseHas('evidence', $evidence);
    }
}
