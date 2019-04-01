@extends('layouts.app')

@section('content')

    <div id="app" class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white border">
                <li class="breadcrumb-item active text-primary" aria-current="page">Home</li>
            </ol>
        </nav>
        <div class="row d-block">
            <newpaper class="col-2 float-left"></newpaper>
            <papers class="col-10 float-right"></papers>
        </div>
    </div>

@endsection
