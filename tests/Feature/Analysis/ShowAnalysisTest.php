<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowAnalysisTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_view_their_analysis() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $analysis = create('App\Analysis', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('GET', '/api' . $analysis->path(), []);
        $response->assertStatus(200);
        $response->assertJson($analysis->makeHidden('paper')->toArray());
    }
}
