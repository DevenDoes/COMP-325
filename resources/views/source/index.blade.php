@extends('layouts.app')

@section('links')
<li class="nav-item active">
    <a class="nav-link text-white" href="/source">Paper</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-center">
                <h2 class="card-title">Bird Beak Morphology and the Evolution Signifigance of Birdsong</h2>
            </div>
            <div class="row justify-content-center mt-2 mb-2">
                <div class="col-10">
                    <p class="card-text text-muted">Before you develop your research project, you need to gain a strong foundation in the research area. Collecting past research and writing a scientific literature review is a useful step toward building your project. Not only will the literature review provide information on the topic, but you will also discover how researchers frame questions, what research methods are typically used, and the conventions for publishing research about your topic.</p>
                    <p class="card-text text-muted">In the literature review, you will weave together five sources. Literature reviews can have different organization schemes, depending on the subject, your objectives, and particular assignment/editorial guidelines. You may decide to organize your literature review chronologically (i.e., tell the history of research on this topic), methodologically (discuss 3 key methods used to study the topic), or thematically (e.g., discuss 3 key themes in the research).</p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <button class="btn btn-secondary mr-2">
                    Class <span class="badge badge-light">ENGL 105</span>
                </button>
                <button class="btn btn-secondary mr-2">
                    Due Date <span class="badge badge-light">2/23/2019</span>
                </button>
                <button class="btn btn-secondary mr-2">
                    Style <span class="badge badge-light">CSE</span>
                </button>
                <button class="btn btn-secondary mr-2">
                    Required Sources <span class="badge badge-light">5</span>
                </button>
            </div>
        </div>
        <div class="card-footer">
            <div class="row justify-content-center">
                <button class="btn btn-outline-primary btn-sm col-4" onclick="window.location.href = '/source/create'">Add New Source</button>
                <div class="col-1"></div>
                <button class="btn btn-outline-primary btn-sm col-4">Create New Outline</button>
            </div>
        </div>
    </div>

    <div class="card-columns">
        @foreach ($sources as $source)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title"><a href="/source/{{ $source->id }}/show">{{ $source->title }}</a></h4>
                    <p class="card-subtitle text-muted">Author(s): {{ $source->author }}</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary mr-1" onclick="window.location.href = '/source/{{ $source->id }}/show'">
                        Insights <span class="badge badge-light">{{ $ideaCount[$source->id] }}</span>
                    </button>
                    <button class="btn btn-sm btn-secondary" onclick="window.location.href = '/source/{{ $source->id }}/show'">
                        Evidence <span class="badge badge-light">{{ $evidenceCount[$source->id] }}</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
