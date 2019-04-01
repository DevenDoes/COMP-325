<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteSourceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_cannot_delete_a_source() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('DELETE', '/api' . $source->path(), []);
        $response->assertStatus(401);
        $this->assertDatabaseHas('sources', ['id' => $source->id]);
    }

    /** @test */
    public function an_authenticated_user_cannot_delete_another_users_source() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $this->signIn();
        $response = $this->json('DELETE', '/api' . $source->path(), []);
        $response->assertStatus(403);
        $this->assertDatabaseHas('sources', ['id' => $source->id]);
    }

    /** @test */
    public function an_authenticated_user_can_delete_their_source() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = create('App\Source', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('DELETE', '/api' . $source->path(), []);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('sources', ['id' => $source->id]);
    }
}
