@extends('layouts.app')

@section('content')
<div class="fxt-form">
    <h2>Forgot Password</h2>
    <p>For recover your password</p>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="input-label">Email Address</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="demo@gmail.com" required="required">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="fxt-btn-fill">Send Me Email</button>
        </div>
    </form>
</div>
<div class="fxt-footer">
    <p>Don't have an account?<a href="{{ route('register') }}" class="switcher-text2 inline-text">Register</a></p>
</div>

@endsection