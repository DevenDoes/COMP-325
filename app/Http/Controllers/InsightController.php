<?php

namespace App\Http\Controllers;

use App\Insight;
use App\Source;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Source $source)
    {
        return view('insight.create')->with([
            'source' => $source,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Source $source)
    {
        $validator = Validator::make($request->all(), [
            'idea' => 'required|max:1024',
        ]);

        if($validator->fails()) {
            return redirect('source/' . $source->id . '/insight/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $insight = Insight::create([
            'user_id' => Auth::id(),
            'source_id' => $source->id,
            'idea' => $request->idea,
        ]);

        return redirect('/source/' . $source->id . '/insight/' . $insight->id . '/evidence/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insight  $insight
     * @return \Illuminate\Http\Response
     */
    public function show(Insight $insight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insight  $insight
     * @return \Illuminate\Http\Response
     */
    public function edit(Insight $insight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insight  $insight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insight $insight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insight  $insight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insight $insight)
    {
        //
    }
}
