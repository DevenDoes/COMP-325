<?php

namespace App\Http\Controllers;

use App\Source;
use App\Paper;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index(Paper $paper)
    {
        return $paper->sources->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paper $paper)
    {
        $this->authorize('create', [Source::class, $paper]);

        $attributes = $request->validate([
            'title' => 'required',
            'authors'=> 'required',
            'location' => 'required',
            'type' => 'required',
            'medium' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['paper_id'] = $paper->id;

        $source = $paper->sources()->create($attributes);

        return $source;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper, Source $source)
    {
        $this->authorize('view', $source);

        return $source->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper, Source $source)
    {
        $this->authorize('update', $source);

        $attributes = $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'location' => 'required',
            'type' => 'required',
            'medium' => 'required',
        ]);

        $source->update($attributes);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper, Source $source)
    {
        $this->authorize('delete', $source);

        $source->delete();

        return response(200);
    }
}
