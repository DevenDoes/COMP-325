<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateAnalysisTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_an_analysis() {
        $this->withoutExceptionHandling();
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $analysis = raw('App\Analysis');
        $response = $this->json('POST', '/api' . $paper->path() . '/analyses', $analysis);
        $response->assertStatus(200);
        $this->assertDatabaseHas('analyses', $analysis);
    }
}
