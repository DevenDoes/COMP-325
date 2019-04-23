<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\signup;
use Illuminate\Support\Facades\Mail;

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

        Mail::to($attributes['email'])->send(new signup($attributes['name']));

        return view('welcome', ['success' => 'true']);

    }
}
