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

        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname'=> 'required',
            'email' => 'required|email|unique:early_accesses',
            'grade' => 'required'
        ]);

        \App\EarlyAccess::create($attributes);

        return redirect('/');

    }
}
