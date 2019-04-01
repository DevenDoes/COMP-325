<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditPaperTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_edit_a_paper() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $editedPaper = [
            'title' => 'updated title',
            'course' => 'updated course',
            'style' => 'updated style',
            'prompt' => 'updated prompt',
        ];
        $response = $this->json('PATCH', '/api' . $paper->path(), $editedPaper);
        $response->assertStatus(401);
        tap($paper->fresh(), function($paper) use($editedPaper) {
            $this->assertNotEquals($editedPaper['title'], $paper->title);
            $this->assertNotEquals($editedPaper['course'], $paper->course);
            $this->assertNotEquals($editedPaper['style'], $paper->style);
            $this->assertNotEquals($editedPaper['prompt'], $paper->prompt);
        });
    }

    /** @test */
    public function an_authenticated_user_cannot_edit_another_users_paper() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $this->signIn();
        $editedPaper = [
            'title' => 'updated title',
            'course' => 'updated course',
            'style' => 'updated style',
            'prompt' => 'updated prompt',
        ];
        $response = $this->json('PATCH', '/api' . $paper->path(), $editedPaper);
        $response->assertStatus(403);
        tap($paper->fresh(), function($paper) use($editedPaper) {
            $this->assertNotEquals($editedPaper['title'], $paper->title);
            $this->assertNotEquals($editedPaper['course'], $paper->course);
            $this->assertNotEquals($editedPaper['style'], $paper->style);
            $this->assertNotEquals($editedPaper['prompt'], $paper->prompt);
        });
    }

    /** @test */
    public function an_authenticated_user_can_edit_their_paper() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $editedPaper = [
            'title' => 'updated title',
            'course' => 'updated course',
            'style' => 'updated style',
            'prompt' => 'updated prompt',
        ];
        $response = $this->json('PATCH', '/api' . $paper->path(), $editedPaper);
        $response->assertStatus(200);
        tap($paper->fresh(), function($paper) use($editedPaper) {
            $this->assertEquals($editedPaper['title'], $paper->title);
            $this->assertEquals($editedPaper['course'], $paper->course);
            $this->assertEquals($editedPaper['style'], $paper->style);
            $this->assertEquals($editedPaper['prompt'], $paper->prompt);
        });
    }
}
