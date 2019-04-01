<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EarlyAccessController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);

        $attributes = $request->validate([
            'name' => 'required',
            'email'=> 'required',
        ]);

        \App\EarlyAccess::create($attributes);

        return view('welcome', ['success' => 'true']);

    }
}
