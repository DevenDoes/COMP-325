@extends('layouts.app')

@section('content')

    @auth

        <section class="section">
            <div class="container">
                <div class="box">
                    <nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumb">
                        <ul>
                            <li class="is-active"><a href="#" aria-current="page">Home</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="columns">
                    <div class="column is-2">
                        <create-paper-item></create-paper-item>
                    </div>
                    <div class="column is-10">
                        <div class="columns">
                            <paper-list></paper-list>
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
