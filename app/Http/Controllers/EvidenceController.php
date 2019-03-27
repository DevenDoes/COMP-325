<?php

namespace App\Http\Controllers;

use App\Evidence;
use App\Source;
use App\Paper;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paper $paper, Source $source)
    {
        $this->authorize('create', [Evidence::class, $paper, $source]);

        $attributes = $request->validate([
            'content' => 'required',
            'location'=> 'required',
            'type' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['paper_id'] = $paper->id;
        $attributes['source_id'] = $source->id;

        $source->evidence()->create($attributes);

        return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper, Source $source, Evidence $evidence)
    {
        $this->authorize('view', $evidence);

        return $evidence->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper, Source $source, Evidence $evidence)
    {
        $this->authorize('update', $evidence);

        $attributes = $request->validate([
            'content' => 'required',
            'location'=> 'required',
            'type' => 'required',
        ]);

        $evidence->update($attributes);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper, Source $source, Evidence $evidence)
    {
        $this->authorize('delete', $evidence);

        $evidence->delete();

        return response(200);
    }
}
