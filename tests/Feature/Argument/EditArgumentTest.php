<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditArgumentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_edit_their_argument() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $argument = create('App\Argument', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $editedArgument = [
            'content' => 'updated content',
        ];
        $response = $this->json('PATCH', '/api' . $argument->path(), $editedArgument);
        $response->assertStatus(200);
        tap($argument->fresh(), function($argument) use($editedArgument) {
            $this->assertEquals($editedArgument['content'], $argument->content);
        });
    }
}
