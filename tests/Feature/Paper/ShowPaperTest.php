<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowPaperTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_view_a_paper() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $response = $this->json('GET', '/api' . $paper->path(), []);
        $response->assertStatus(401);
        $response->assertJsonMissing($paper->toArray());
    }

    /** @test */
    public function an_authenticated_user_cannot_view_another_users_paper() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $this->signIn();
        $response = $this->json('GET', '/api' . $paper->path(), []);
        $response->assertStatus(403);
        $response->assertJsonMissing($paper->toArray());
    }

    /** @test */
    public function an_authenticated_user_can_view_their_paper() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $response = $this->json('GET', '/api' . $paper->path(), []);
        $response->assertStatus(200);
        $response->assertJson($paper->toArray());
    }
}
