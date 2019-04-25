<?php

namespace App\Http\Controllers;

use App\Argument;
use App\Paper;
use Illuminate\Http\Request;

class ArgumentController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index(Paper $paper) {
        $this->authorize('index', [Argument::class, $paper]);

        return $paper->arguments->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paper $paper)
    {
        $this->authorize('create', [Argument::class, $paper]);

        $attributes = $request->validate([
            'content' => 'required',
            'selected' => 'required',
            'deselected' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['paper_id'] = $paper->id;

        $argument = $paper->arguments()->create($attributes);

        $argument->analyses()->sync([]);

        foreach($attributes['selected'] as $selected) {
            $argument->analyses()->syncWithoutDetaching([$selected['id'] => [
                'user_id' => auth()->id(),
                'paper_id' => $paper->id,
            ]]);
        }

        return $paper->arguments()->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Argument  $argument
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper, Argument $argument)
    {
        $this->authorize('view', $argument);

        return $argument->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Argument  $argument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper, Argument $argument)
    {
        $this->authorize('update', $argument);

        $attributes = $request->validate([
            'content' => 'required',
            'selected' => 'required',
            'deselected' => 'required',
        ]);

        //$attributes['user_id'] = auth()->id();

        $argument->update($attributes);

        $argument->analyses()->sync([]);

        foreach($attributes['selected'] as $selected) {
            $argument->analyses()->syncWithoutDetaching([$selected['id'] => [
                'user_id' => auth()->id(),
                'paper_id' => $paper->id,
            ]]);
        }

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Argument  $argument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper, Argument $argument)
    {
        $this->authorize('delete', $argument);

        $argument->analyses()->sync([]);

        $argument->delete();

        return response(200);
    }
}
