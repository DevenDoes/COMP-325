<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteOutlineTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_delete_their_outline() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $outline = create('App\Outline', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('DELETE', '/api' . $outline->path(), []);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('outlines', ['id' => $outline->id]);
    }
}
