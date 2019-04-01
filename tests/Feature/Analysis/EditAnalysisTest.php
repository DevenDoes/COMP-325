<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditAnalysisTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_edit_their_analysis() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $analysis = create('App\Analysis', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $editedAnalysis = [
            'content' => 'updated content',
        ];
        $response = $this->json('PATCH', '/api' . $analysis->path(), $editedAnalysis);
        $response->assertStatus(200);
        tap($analysis->fresh(), function($analysis) use($editedAnalysis) {
            $this->assertEquals($editedAnalysis['content'], $analysis->content);
        });
    }
}
