@extends('layouts.app')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="/source">Paper</a>
</li>
<li class="nav-item active">
    <a class="nav-link text-white" href="/source/create">Source</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Add New Source</h3>
        </div>
        <form action="/source/store" method="post">
            @csrf
            <div class="card-body">
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
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
