@extends('layouts.app')

@section('content')

    @auth

        <section class="section">
            <div class="container">
                <div class="box">
                    <nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumb">
                        <ul>
                            <li class=""><a href="/papers" aria-current="page">Home</a></li>
                            <li class=""><a href="/papers/{{ $paper->id }}" aria-current="page">Paper</a></li>
                            <li class=""><a href="/papers/{{ $paper->id }}/sources" aria-current="page">Sources</a></li>
                            <li class="is-active"><a href="#" aria-current="page">Research</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="columns">
                    <div class="column is-2">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="box">
                                    <p class="title is-6">{{ $source->title }}</p>
                                    <p class="">{{ $source->authors }}</p>
                                    <p class="">{{ $source->type }}</p>
                                    <p class="">{{ $source->medium }}</p>
                                </div>
                            </div>
                            <div class="column is-12">
                                <create-research-item
                                    :paper="{{ $paper->id }}"
                                    :source="{{ $source->id }}">
                                </create-research-item>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <research-list
                            paper="{{ $paper->id }}"
                            :research-list="{{ json_encode($evidence) }}">
                        </research-list>
                    </div>
                </div>
            </div>
        </section>

        @endauth

        @guest

            <section class="section">
                <div class="box has-text-centered">
                    You must <a href="/login">sign in</a> to view this page.
                </div>
            </section>

        @endguest

@endsection
