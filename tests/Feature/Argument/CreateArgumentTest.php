<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateArgumentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_an_argument() {
        $this->withoutExceptionHandling();
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $argument = raw('App\Argument');
        $response = $this->json('POST', '/api' . $paper->path() . '/arguments', $argument);
        $response->assertStatus(200);
        $this->assertDatabaseHas('arguments', $argument);
    }
}
