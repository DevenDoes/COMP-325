@extends('layouts.app')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="/source">Paper</a>
</li>
<li class="nav-item active">
    <a class="nav-link text-primary" href="/source/{{ $source->id }}/show">Source</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Existing Source</h3>
        </div>
        <form action="/source/{{ $source->id }}/update" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Source Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ $source->title }}">
                </div>
                <div class="form-group">
                    <label for="author">Source Author(s):</label>
                    <input type="text" class="form-control" name="author" placeholder="Enter author name(s)" value="{{ $source->author }}">
                </div>
                <div class="form-group">
                    <label for="location">Source Location:</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter location" value="{{ $source->location }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
