<?php

namespace App\Http\Controllers;

use App\Analysis;
use App\Paper;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index(Paper $paper) {
        $this->authorize('index', [Analysis::class, $paper]);

        return $paper->analyses->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paper $paper)
    {
        $this->authorize('create', [Analysis::class, $paper]);

        $attributes = $request->validate([
            'content' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['paper_id'] = $paper->id;

        $paper->analyses()->create($attributes);

        return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper, Analysis $analysis)
    {
        $this->authorize('view', $analysis);

        return $analysis->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper, Analysis $analysis)
    {
        $this->authorize('update', $analysis);

        $attributes = $request->validate([
            'content' => 'required',
            'selected' => 'required',
            'deselected' => 'required',
        ]);

        $analysis->update($attributes);

        $analysis->evidence()->sync([]);

        foreach($attributes['selected'] as $selected) {
            $analysis->evidence()->syncWithoutDetaching([$selected['id'] => [
                'user_id' => auth()->id(),
                'paper_id' => $paper->id,
            ]]);
        }

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper, Analysis $analysis)
    {
        $this->authorize('delete', $analysis);

        $analysis->evidence()->sync([]);

        $analysis->delete();

        return response(200);
    }
}
