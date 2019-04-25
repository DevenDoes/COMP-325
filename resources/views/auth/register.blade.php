@extends('layouts.app')

@section('content')

<div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-4">
                <div class="box">
                    <h1 class="title is-5 has-text-centered">Register</h1>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field">
                            <label for="name" class="label">Name</label>
                            <div class="control">
                                <input type="text" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @if ($errors->has('name'))
                                <span class="is-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <div class="control">
                                <input type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="is-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <div class="control">
                                <input type="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password" placeholder="Password" value="{{ old('password') }}" required autofocus>
                            </div>
                            @if ($errors->has('password'))
                                <span class="is-danger" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="field">
                            <label for="password-confirm" class="label">Confirm Password</label>
                            <div class="control">
                                <input type="password" class="input {{ $errors->has('password-confirm') ? ' is-danger' : '' }}" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password-confirm') }}" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
