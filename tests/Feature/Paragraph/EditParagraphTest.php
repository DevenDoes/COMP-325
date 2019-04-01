<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditParagraphTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_edit_their_paragraph() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $outline = create('App\Outline', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $paragraph = create('App\Paragraph', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
            'outline_id' => $outline->id,
        ]);
        $editedParagraph = [
            'topic' => 'updated topic',
        ];
        $response = $this->json('PATCH', '/api' . $paragraph->path(), $editedParagraph);
        $response->assertStatus(200);
        tap($paragraph->fresh(), function($paragraph) use($editedParagraph) {
            $this->assertEquals($editedParagraph['topic'], $paragraph->topic);
        });
    }
}
