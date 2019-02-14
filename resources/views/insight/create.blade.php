@extends('layouts.app')

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
