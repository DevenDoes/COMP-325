<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowOutlineTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_view_their_outline() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $outline = create('App\Outline', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('GET', '/api' . $outline->path(), []);
        $response->assertStatus(200);
        $response->assertJson($outline->makeHidden('paper')->toArray());
    }
}
