<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteArgumentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_delete_their_argument() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $argument = create('App\Argument', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $response = $this->json('DELETE', '/api' . $argument->path(), []);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('arguments', ['id' => $argument->id]);
    }
}
