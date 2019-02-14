<?php

namespace App\Http\Controllers;

use App\Source;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SourceController extends Controller
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
        $sources = Auth::user()->sources()->get();
        $ideaCount = array();
        $evidenceCount = array();

        foreach ($sources as $source) {
            $ideaCount[$source->id] = $source->insights()->get()->count();
            $evidenceCount[$source->id] = $source->evidence()->get()->count();
        }

        return view('source.index')->with([
            'sources' => $sources,
            'ideaCount' => $ideaCount,
            'evidenceCount' => $evidenceCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('source.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return redirect('source/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $source = Source::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'author' => $request->author,
            'location' => $request->location,
        ]);

        return redirect('/source/' . $source->id . '/show/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //dd($source->evidence()->get());
        return view('source.show')->with([
            'source' => $source,
            'insights' => $source->insights()->get(),
            'evidence' => $source->evidence()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('source.edit')->with([
            'source' => $source,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return redirect('source/edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        $source->update([
            'title' => $request->title,
            'author' => $request->author,
            'location' => $request->location,
        ]);

        return redirect('/source/' . $source->id . '/show/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        $source->delete();

        return redirect()->action('SourceController@index');
    }
}
