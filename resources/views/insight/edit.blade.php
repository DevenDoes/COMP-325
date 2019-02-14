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
        <div class="card-header">
            <h3 class="card-title">Edit Insight</h3>
        </div>
        <form action="/source/{{ $source->id }}/insight/{{ $insight->id }}/update" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="idea">Your Idea:</label>
                    <textarea class="form-control" name="idea" placeholder="Enter idea">{{ $insight->idea }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
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
            </div>
        @endforeach
    </div>
</div>
@endsection
