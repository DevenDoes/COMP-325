<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditEvidenceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_edit_their_evidence() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = create('App\Source', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $evidence = create('App\Evidence', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
            'source_id' => $source->id,
        ]);
        $editedEvidence = [
            'content' => 'updated content',
            'location' => 'updated location',
            'type' => 'updated type',
        ];
        $response = $this->json('PATCH', $evidence->path(), $editedEvidence);
        $response->assertStatus(200);
        tap($evidence->fresh(), function($evidence) use($editedEvidence) {
            $this->assertEquals($editedEvidence['content'], $evidence->content);
            $this->assertEquals($editedEvidence['location'], $evidence->location);
            $this->assertEquals($editedEvidence['type'], $evidence->type);
        });
    }
}
