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
    <a class="nav-link text-primary" href="/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evidenceEdit->id }}/show">Evidence</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <h3 class="card-title">Your Idea:</h3>
        </div>
        <div class="card-body">
            <p>{{ $insight->idea }}</p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <h3>Edit Supporting Material</h3>
        </div>
        <form id="evidenceForm" action="/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evidenceEdit->id }}/update" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="quote">Supporting Material:</label>
                    <textarea class="form-control" name="quote" placeholder="Enter supporting material">{{ $evidenceEdit->quote }}</textarea>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter location of supporting material" value="{{ $evidenceEdit->location }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Supporting Material</button>
            </div>
        </form>
    </div>
    <div class="card-columns">
        @foreach ($evidence as $evi)
            @if($evi->id !== $evidenceEdit->id)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">{{ $evi->quote }}</p>
                        <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer text-muted">{{ $evi->location }}</footer>
                        </blockquote>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <button class="col-3 btn btn-sm btn-outline-success" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evi->id }}/edit'">Edit Evidence</button>
                            <div class="col-1"></div>
                            <button class="col-3 btn btn-sm btn-outline-danger" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evi->id }}/destroy'">Delete Idea</button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

@endsection
