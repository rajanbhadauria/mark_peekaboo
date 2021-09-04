@extends('layouts.app')

@section('content')
<script src="{{ asset('js/password_meter.js') }}"></script>
<div class="fxt-form">
    <h2>Register</h2>
    <p>Create an account</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="first_name" class="input-label">{{ __('First Name') }}</label>
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required1
                autocomplete="first_name" required1 autofocus>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_name" class="input-label">Last Name</label>
            <input id="last_name" type="text" placeholder="Last Name"
                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                value="{{ old('last_name') }}" required1 autocomplete="last_name" autofocus>

            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="input-label">Email Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required1 autocomplete="email" placeholder="demo@email.com">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="input-label">Password</label>
            <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon-password"></i>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" placeholder="********" required1="required" autocomplete="new-password"
                onkeyup="return checkPwdStrength();">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
                <div id="pmId" class="container">
                    <div class="row">
                        <div id="scorebarBorder">
                            <div id="scorebar"></div>
                        </div>
                    </div>
                    <div class="row"><span id="complexity"></span></div>
                </div>

        </div>
        <div class="form-group">
            <label for="password-confirm" class="input-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required1
                autocomplete="new-password" placeholder="********">
            <i toggle="#password-confirm" class="fa fa-fw fa-eye toggle-password field-icon"></i>
        </div>
        <div class="form-group">
            <button type="submit" class="fxt-btn-fill">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
<div class="fxt-footer">
    <p>Have an account?<a href="{{ route('login') }}" class="switcher-text2 inline-text">{{ __('Login') }}</a> </p>
</div>

@endsection