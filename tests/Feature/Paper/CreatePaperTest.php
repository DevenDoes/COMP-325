<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePaperTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_create_a_paper() {
        $paper = raw('App\Paper');
        $response = $this->json('POST', '/papers', $paper);
        $response->assertStatus(401);
        $this->assertDatabaseMissing('papers', $paper);
    }

    /** @test */
    public function an_authenticated_user_can_create_a_paper() {
        $this->signIn();
        $paper = raw('App\Paper');
        $response = $this->json('POST', '/papers', $paper);
        $response->assertStatus(200);
        $this->assertDatabaseHas('papers', $paper);
    }
}
