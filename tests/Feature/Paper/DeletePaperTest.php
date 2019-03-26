<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeletePaperTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_delete_a_paper() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $response = $this->json('DELETE', $paper->path(), []);
        $response->assertStatus(401);
        $this->assertDatabaseHas('papers', $paper->toArray());
    }

    /** @test */
    public function an_authenticated_user_cannot_delete_another_users_paper() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $this->signIn();
        $response = $this->json('DELETE', $paper->path(), []);
        $response->assertStatus(403);
        $this->assertDatabaseHas('papers', $paper->toArray());
    }

    /** @test */
    public function an_authenticated_user_can_delete_their_paper() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $response = $this->json('DELETE', $paper->path(), []);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('papers', $paper->toArray());
    }
}
