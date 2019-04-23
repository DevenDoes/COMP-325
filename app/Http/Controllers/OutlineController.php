<?php

namespace App\Http\Controllers;

use App\Outline;
use App\Paper;
use Illuminate\Http\Request;

class OutlineController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index(Paper $paper) {
        $this->authorize('index', [Outline::class, $paper]);

        return $paper->outlines->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paper $paper)
    {
        $this->authorize('create', [Outline::class, $paper]);

        $attributes = $request->validate([
            'thesis' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['paper_id'] = $paper->id;

        $paper->outlines()->create($attributes);

        return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outline  $outline
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper, Outline $outline)
    {
        $this->authorize('view', $outline);

        return $outline->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outline  $outline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper, Outline $outline)
    {
        $this->authorize('update', $outline);

        $attributes = $request->validate([
            'thesis' => 'required',
        ]);

        $outline->update($attributes);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outline  $outline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper, Outline $outline)
    {
        $this->authorize('delete', $outline);

        $outline->delete();

        return response(200);
    }
}
