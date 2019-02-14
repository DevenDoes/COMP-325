@extends('layouts.app')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="/source">Paper</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/source/{{ $source->id }}/show">Source</a>
</li>
<li class="nav-item active">
    <a class="nav-link text-primary" href="/source/{{ $source->id }}/insight/{{ $insight->id }}/show">Insight</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title">{{ $insight->idea }}</h2>
        </div>
        <div class="card-footer">
            <div class="row justify-content-center">
                <button class="btn btn-outline-primary btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/create'">Add Evidence</button>
                <div class="col-1"></div>
                <button class="btn btn-outline-success btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/edit'">Edit Insight</button>
                <div class="col-1"></div>
                <button class="btn btn-outline-danger btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/destroy'">Delete Insight</button>
            </div>
        </div>
    </div>

    <div class="card-columns">
        @foreach ($evidence as $evi)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text">{{ $evi->quote }}</p>
                    <blockquote class="blockquote mb-0">
                        <footer class="blockquote-footer text-muted">{{ $evi->location }}</footer>
                    </blockquote>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <button class="btn btn-outline-success btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evi->id }}/edit'">Edit Evidence</button>
                        <div class="col-1"></div>
                        <button class="btn btn-outline-danger btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evi->id }}/destroy'">Delete Evidence</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
