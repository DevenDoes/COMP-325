@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Your Idea:</h3>
            <p>{{ $insight->idea }}</p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <form id="evidenceForm" action="/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/store" method="post">
                @csrf
                <div class="form-group">
                    <label for="quote">Supporting Material:</label>
                    <textarea class="form-control" name="quote" placeholder="Enter supporting material"></textarea>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter location of supporting material">
                </div>
                <input id="finish" type="hidden" name="finish" value="">
                <button type="button" class="btn btn-secondary" onclick="formSubmit(event, false)">Add Additional Material</button>
                <button type="button" class="btn btn-primary" onclick="formSubmit(event, true)">Finish Idea</button>
            </form>
        </div>
    </div>
    @foreach ($evidence as $evi)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">{{ $evi->quote }}</p>
                <p class="card-subtitle text-muted">{{ $evi->location }}</p>
            </div>
        </div>
    @endforeach
</div>

<script>
function formSubmit(event, val) {
    document.getElementById('finish').value = val;
    document.getElementById('evidenceForm').submit()
}
</script>
@endsection
