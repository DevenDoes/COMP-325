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
                            <li class="is-active"><a href="#" aria-current="page">Sources</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="columns">
                    <div class="column is-2">
                        <create-source-item
                            :paper="{{ $paper->id }}">
                        </create-source-item>
                    </div>
                    <div class="column">
                        <source-list
                            :paper="{{ $paper->id }}">
                        </source-list>
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
