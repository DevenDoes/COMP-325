@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title">Your Sources</h2>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-sm" onclick="window.location.href = '/source/create'">Add New Source</button>
        </div>
    </div>

    @foreach ($sources as $source)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">{{ $source->title }}</h4>
                <p class="card-subtitle text-muted">{{ $source->author }} | {{ $source->location }}</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-sm" onclick="window.location.href = '/insight/create/{{ $source->id }}'">View Source</button>
                <button class="btn btn-success btn-sm" onclick="window.location.href = '/insight/create/{{ $source->id }}'">Add Insights</button>
                <button class="btn btn-warning btn-sm" onclick="window.location.href = '/source/{{ $source->id }}/edit'">Edit Source</button>
                <button class="btn btn-danger btn-sm" onclick="window.location.href = '/source/{{ $source->id }}/destroy'">Delete Source</button>
            </div>
        </div>
    @endforeach

</div>
@endsection
