@extends('layouts.app')

@section('content')
<div class="fxt-form">
    <h2>Login</h2>
    <p>Login into your pages account</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="input-label">Email Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" required="required"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="input-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">
            <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="fxt-checkbox-area">
                <div class="checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Keep me logged in</label>
                </div>
                @if (Route::has('password.request'))
                <a class="switcher-text" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
                @endif
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="fxt-btn-fill">Log in</button>
        </div>
    </form>
</div>
<div class="fxt-style-line">
    <h3>Or</h3>
</div>

<div class="fxt-footer">
@if (Route::has('register'))
<p>Don't have an account?<a class="switcher-text2 inline-text" href="{{ route('register') }}">{{ __('Register') }}</a></p>
</div>
@endif

@endsection