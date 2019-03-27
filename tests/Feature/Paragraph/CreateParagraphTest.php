<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateParagraphTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_a_paragraph() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $outline = create('App\Outline', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $paragraph = raw('App\Paragraph');
        $response = $this->json('POST', $outline->path() . '/paragraphs', $paragraph);
        $response->assertStatus(200);
        $this->assertDatabaseHas('paragraphs', $paragraph);
    }
}
