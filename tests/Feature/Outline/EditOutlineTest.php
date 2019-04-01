<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditOutlineTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_edit_their_outline() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $outline = create('App\Outline', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $editedOutline = [
            'thesis' => 'updated thesis',
        ];
        $response = $this->json('PATCH', '/api' . $outline->path(), $editedOutline);
        $response->assertStatus(200);
        tap($outline->fresh(), function($outline) use($editedOutline) {
            $this->assertEquals($editedOutline['thesis'], $outline->thesis);
        });
    }
}
