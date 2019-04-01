<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowEvidenceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_view_their_evidence() {
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
        $response = $this->json('GET', '/api' . $evidence->path(), []);
        $response->assertStatus(200);
        $response->assertJson($evidence->makeHidden(['paper', 'source'])->toArray());
    }
}
