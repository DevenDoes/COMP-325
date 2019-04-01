<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowParagraphTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_view_their_paragraph() {
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
        $response = $this->json('GET', '/api' . $paragraph->path(), []);
        $response->assertStatus(200);
        $response->assertJson($paragraph->makeHidden(['paper', 'outline'])->toArray());
    }
}
