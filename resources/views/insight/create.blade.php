@extends('layouts.app')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="/source">Paper</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/source/{{ $source->id }}/show">Source</a>
</li>
<li class="nav-item active">
    <a class="nav-link text-white" href="/source/{{ $source->id }}/insight/create">Insight</a>
</li>
@endsection

@section('content')
<div class="container">
    <form action="/source/{{ $source->id }}/insight/store" method="post">
        @csrf
        <div class="form-group">
            <label for="idea">Your Idea:</label>
            <textarea class="form-control" name="idea" placeholder="Enter idea"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
    </form>
</div>
@endsection
