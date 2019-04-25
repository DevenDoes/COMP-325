@extends('layouts.app')

@section('content')

    @auth

        <section class="section">
            <div class="container">
                <div class="box">
                    <nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumb">
                        <ul>
                            <li class=""><a href="/papers" aria-current="page">Home</a></li>
                            <li class="is-active"><a href="#" aria-current="page">Paper</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="columns">
                    <div class="column is-2">
                        <div class="box">
                            <aside class="menu">
                                <p class="menu-label">
                                    Actions
                                </p>
                                <ul class="menu-list">
                                    <li><a href="/papers/{{ $paper->id }}/sources">Research</a></li>
                                    <li><a href="/papers/{{ $paper->id }}/analyses">Analyze</a></li>
                                    <li><a href="/papers/{{ $paper->id }}/arguments">Argue</a></li>
                                    <li><a href="#">Outline</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                    <div class="column is-10">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="card">
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            {{$paper->title}}
                                        </p>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            {{$paper->prompt}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <papercontent paperid="{{ $paper->id }}"></papercontent>
                            </div>
                        </div>
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
