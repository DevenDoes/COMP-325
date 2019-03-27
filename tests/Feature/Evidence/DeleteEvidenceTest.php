<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteEvidenceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_delete_their_evidence() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = create('App\Source', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $evidence = create('App\Evidence', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
            'source_id' => $source->id,
        ]);
        $response = $this->json('DELETE', $evidence->path(), []);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('evidence', ['id' => $evidence->id]);
    }
}
