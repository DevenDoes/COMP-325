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
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-center">
                <h2 class="card-title col-11">{{ $source->title }}</h2>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="card-subtitle text-muted"><strong>Author(s):</strong> {{ $source->author }}</p>
                </li>
                <li class="list-group-item">
                    <p class="card-subtitle text-muted"><strong>Location:</strong> {{ $source->location }}</p>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <div class="row justify-content-center">
                <button class="btn btn-outline-primary btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/insight/create'">Add Insight</button>
                <div class="col-1"></div>
                <button class="btn btn-outline-success btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/edit'">Edit Source</button>
                <div class="col-1"></div>
                <button class="btn btn-outline-danger btn-sm col-3" onclick="window.location.href = '/source/{{ $source->id }}/destroy'">Delete Source</button>
            </div>
        </div>
    </div>

    <div class="card-columns">
        @foreach ($insights as $insight)
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">{{ $insight->idea }}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($evidence as $evi)
                            @if ($insight->id === $evi->insight_id)
                                <li class="list-group-item">
                                    <p class="card-text">{{ $evi->quote }}</p>
                                    <blockquote class="blockquote mb-0">
                                        <footer class="blockquote-footer text-muted">{{ $evi->location }}</footer>
                                    </blockquote>
                                    <div class="row justify-content-end">
                                        <div>
                                            <a class="badge badge-danger float-right mr-1" href="/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evi->id }}/destroy">Delete</a>
                                            <a class="badge badge-success float-right mr-1" href="/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evi->id }}/edit">Edit</a>
                                            <a class="badge badge-secondary float-right mr-1" href="/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/{{ $evi->id }}/show">View</a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <button class="col-3 btn btn-sm btn-outline-primary" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/evidence/create'">Add Evidence</button>
                        <div class="col-1"></div>
                        <button class="col-3 btn btn-sm btn-outline-secondary" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/show'">View Insight</button>
                        <div class="col-1"></div>
                        <button class="col-3 btn btn-sm btn-outline-success" onclick="window.location.href = '/source/{{ $source->id }}/insight/{{ $insight->id }}/edit'">Edit Insight</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
