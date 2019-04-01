<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditSourceTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
    }

    /** @test */
    public function an_unauthenticated_user_cannot_edit_a_source() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $editedSource = [
            'title' => 'updated title',
            'authors' => 'updated authors',
            'location' => 'updated location',
            'type' => 'updated type',
            'medium' => 'updated medium',
        ];
        $response = $this->json('PATCH', '/api' . $source->path(), $editedSource);
        $response->assertStatus(401);
        tap($source->fresh(), function($source) use($editedSource) {
            $this->assertNotEquals($editedSource['title'], $source->title);
            $this->assertNotEquals($editedSource['authors'], $source->authors);
            $this->assertNotEquals($editedSource['location'], $source->location);
            $this->assertNotEquals($editedSource['type'], $source->type);
            $this->assertNotEquals($editedSource['medium'], $source->medium);
        });
    }

    /** @test */
    public function an_authenticated_user_cannot_edit_another_users_source() {
        $user = create('App\User');
        $paper = create('App\Paper', [
            'user_id' => $user->id,
        ]);
        $source = create('App\Source', [
            'user_id' => $user->id,
            'paper_id' => $paper->id,
        ]);
        $editedSource = [
            'title' => 'updated title',
            'authors' => 'updated authors',
            'location' => 'updated location',
            'type' => 'updated type',
            'medium' => 'updated medium',
        ];
        $this->signIn();
        $response = $this->json('PATCH', '/api' . $source->path(), $editedSource);
        $response->assertStatus(403);
        tap($source->fresh(), function($source) use($editedSource) {
            $this->assertNotEquals($editedSource['title'], $source->title);
            $this->assertNotEquals($editedSource['authors'], $source->authors);
            $this->assertNotEquals($editedSource['location'], $source->location);
            $this->assertNotEquals($editedSource['type'], $source->type);
            $this->assertNotEquals($editedSource['medium'], $source->medium);
        });
    }

    /** @test */
    public function an_authenticated_user_can_edit_their_source() {
        $this->signIn();
        $paper = create('App\Paper', [
            'user_id' => auth()->id(),
        ]);
        $source = create('App\Source', [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);
        $editedSource = [
            'title' => 'updated title',
            'authors' => 'updated authors',
            'location' => 'updated location',
            'type' => 'updated type',
            'medium' => 'updated medium',
        ];
        $response = $this->json('PATCH', '/api' . $source->path(), $editedSource);
        $response->assertStatus(200);
        tap($source->fresh(), function($source) use($editedSource) {
            $this->assertEquals($editedSource['title'], $source->title);
            $this->assertEquals($editedSource['authors'], $source->authors);
            $this->assertEquals($editedSource['location'], $source->location);
            $this->assertEquals($editedSource['type'], $source->type);
            $this->assertEquals($editedSource['medium'], $source->medium);
        });
    }
}
