<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateOutlineTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_an_outline() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $outline = raw('App\Outline');
        $response = $this->json('POST', '/api' . $paper->path() . '/outlines', $outline);
        $response->assertStatus(200);
        $this->assertDatabaseHas('outlines', $outline);
    }
}
