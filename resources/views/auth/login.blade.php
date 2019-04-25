@extends('layouts.app')

@section('content')

<div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-4">
                <div class="box">
                    <h1 class="title is-5 has-text-centered">Login</h1>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
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
                        <div class="field is-grouped is-grouped-centered">
                            <div class="control">
                                <label class="checkbox" for="remember">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember Me
                                </label>
                            </div>
                            <div class="control">
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        Reset Password
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
