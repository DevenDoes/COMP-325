<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateSourceTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
    }

    /** @test */
    public function an_unauthenticated_user_cannot_create_a_source() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = raw('App\Source');
        $response = $this->json('POST', '/api' . $paper->path() . '/sources', $source);
        $response->assertStatus(401);
        $this->assertDatabaseMissing('sources', $source);
    }

    /** @test */
    public function an_authenticated_user_cannot_create_a_source_for_another_users_paper() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $this->signIn();
        $source = raw('App\Source');
        $response = $this->json('POST', '/api' . $paper->path() . '/sources', $source);
        $response->assertStatus(403);
        $this->assertDatabaseMissing('sources', $source);
    }

    /** @test */
    public function an_authenticated_user_can_create_a_source() {
        $this->withoutExceptionHandling();
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = raw('App\Source');
        $response = $this->json('POST', '/api' . $paper->path() . '/sources', $source);
        $response->assertStatus(200);
        $this->assertDatabaseHas('sources', $source);
    }
}
