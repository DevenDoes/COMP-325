@extends('layouts.app')

@section('content')

    <div id="app" class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white border">
                <li class="breadcrumb-item text-secondary"><a class="text-secondary" href="/papers">Home</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="paper">Paper</li>
            </ol>
        </nav>
        <div class="row d-block">
            <div class="col-2 float-left">
                <div class="list-group">
                    <button class="list-group-item list-group-item-action" type="button">Research</button>
                    <button class="list-group-item list-group-item-action" type="button">Analyze</button>
                    <button class="list-group-item list-group-item-action" type="button">Argue</button>
                    <button class="list-group-item list-group-item-action" type="button">Outline</button>
                </div>
            </div>
            <paperdetails class="col-10 float-right mb-3" papertitle="{{$paper->title}}" paperprompt="{{$paper->prompt}}"></paperdetails>
            <papercontent class="col-10 float-right mb-3" paperid="{{$paper->id}}"></papercontent>


            <papers class="col-10 float-right"></papers>
        </div>
    </div>

@endsection
