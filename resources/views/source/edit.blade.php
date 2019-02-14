@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/source/{{ $source->id }}/update" method="post">
        @csrf
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
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
