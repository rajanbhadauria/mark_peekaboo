@extends('layouts.app')

@section('content')
<script src="{{ asset('js/password_meter.js') }}"></script>
<div class="fxt-form">
    <h2>{{ __('Reset Password') }}</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>


            

            <div class="form-group">
                <label for="password" class="input-label">{{ __('Password') }}</label>
                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon-password"></i>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="********" onkeyup="return checkPwdStrength();">

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
                <label for="password-confirm"
                    class="input-label">{{ __('Confirm Password') }}</label>
                    <i toggle="#password-confirm" class="fa fa-fw fa-eye toggle-password field-icon"></i>

                    <input id="password-confirm" type="password" placeholder="********" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
            </div>

            <div class="form-group">
                    <button type="submit" class="fxt-btn-fill">
                        {{ __('Reset Password') }}
                    </button>
            </div>
        </form>
</div>

@endsection