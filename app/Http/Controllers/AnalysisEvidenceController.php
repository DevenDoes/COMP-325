<?php

namespace App\Http\Controllers;

use App\AnalysisEvidence;
use App\Analysis;
use App\Evidence;
use App\Paper;
use Illuminate\Http\Request;

class AnalysisEvidenceController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Paper $paper, Analysis $analysis)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paper $paper, Analysis $analysis)
    {
        $attributes = $request->validate([
            'evidence' => 'required',
        ]);

        $analysis->evidence()->attach($attributes['evidence']['id'], [
            'user_id' => auth()->id(),
            'paper_id' => $paper->id,
        ]);

        return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnalysisEvidence  $analysisEvidence
     * @return \Illuminate\Http\Response
     */
    public function show(AnalysisEvidence $analysisEvidence)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnalysisEvidence  $analysisEvidence
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalysisEvidence $analysisEvidence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnalysisEvidence  $analysisEvidence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnalysisEvidence $analysisEvidence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnalysisEvidence  $analysisEvidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnalysisEvidence $analysisEvidence)
    {
        //
    }
}
