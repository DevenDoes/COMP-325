<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return auth()->user()->papers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'title' => 'required',
            'course' => 'required',
            'style' => 'required',
            'prompt' => 'required',
        ]);

        $paper = auth()->user()->papers()->create($attributes);

        return $paper;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        $this->authorize('view', $paper);

        return $paper->where('id', $paper->id)->with(['evidence', 'analyses', 'arguments', 'outlines'])->first()->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        $this->authorize('update', $paper);

        $attributes = $request->validate([
            'title' => 'required',
            'course' => 'required',
            'style' => 'required',
            'prompt' => 'required',
        ]);

        $paper->update($attributes);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        $this->authorize('delete', $paper);

        $paper->delete();

        return response(200);
    }
}
