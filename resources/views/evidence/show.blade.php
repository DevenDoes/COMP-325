@extends('layouts.app')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="/source">Paper</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/source/{{ $source->id }}/show">Source</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/source/{{ $source->id }}/insight/{{ $insight->id }}/show">Insight</a>
</li>
<li class="nav-item active">
    <a class="nav-link text-primary" href="/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evidence->id }}/show">Evidence</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-text">{{ $evidence->quote }}</h2>
            <blockquote class="blockquote mb-0">
                <footer class="blockquote-footer text-muted">{{ $evidence->location }}</footer>
            </blockquote>
        </div>
        <div class="card-footer">
            <div class="row justify-content-center">
                <button class="btn btn-outline-success btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evidence->id }}/edit'">Edit Evidence</button>
                <div class="col-1"></div>
                <button class="btn btn-outline-danger btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evidence->id }}/destroy'">Delete Evidence</button>
            </div>
        </div>
    </div>
</div>
@endsection
