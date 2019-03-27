<?php

namespace App\Http\Controllers;

use App\Paragraph;
use App\Outline;
use App\Paper;
use Illuminate\Http\Request;

class ParagraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paper $paper, Outline $outline)
    {
        $this->authorize('create', [Paragraph::class, $paper]);

        $attributes = $request->validate([
            'topic' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['paper_id'] = $paper->id;

        $outline->paragraphs()->create($attributes);

        return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper, Outline $outline, Paragraph $paragraph)
    {
        $this->authorize('view', $paragraph);

        return $paragraph->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper, Outline $outline, Paragraph $paragraph)
    {
        $this->authorize('update', $paragraph);

        $attributes = $request->validate([
            'topic' => 'required',
        ]);

        $paragraph->update($attributes);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper, Outline $outline, Paragraph $paragraph)
    {
        $this->authorize('delete', $paragraph);

        $paragraph->delete();

        return response(200);
    }
}
