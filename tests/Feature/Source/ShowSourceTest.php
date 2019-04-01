<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowSourceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_view_a_source() {
        //$this->withExceptionHandling();
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('GET', '/api' . $source->path(), []);
        $response->assertStatus(401);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_another_users_source() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $this->signIn();
        $response = $this->json('GET', '/api' . $source->path(), []);
        $response->assertStatus(403);
    }

    /** @test */
    public function an_authenticated_user_can_view_their_source() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = create('App\Source', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('GET', '/api' . $source->path(), []);
        $response->assertStatus(200);
        $response->assertJson($source->makeHidden('paper')->toArray());
    }
}
