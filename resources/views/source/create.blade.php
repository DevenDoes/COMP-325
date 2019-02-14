@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/source/store" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Source Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="author">Source Author(s):</label>
            <input type="text" class="form-control" name="author" placeholder="Enter author name(s)">
        </div>
        <div class="form-group">
            <label for="location">Source Location:</label>
            <input type="text" class="form-control" name="location" placeholder="Enter location">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
