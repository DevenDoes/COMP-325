<?php

namespace App\Http\Controllers;

use App\Argument;
use App\Paper;
use Illuminate\Http\Request;

class ArgumentController extends Controller
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
    public function store(Request $request, Paper $paper)
    {
        $this->authorize('create', [Argument::class, $paper]);

        $attributes = $request->validate([
            'content' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['paper_id'] = $paper->id;

        $paper->arguments()->create($attributes);

        return response(200);
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
        ]);

        $attributes['user_id'] = auth()->id();

        $argument->update($attributes);

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

        $argument->delete();

        return response(200);
    }
}
