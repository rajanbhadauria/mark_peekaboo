@extends('layouts.app')

@section('content')

<div class="fxt-form">
            <div class="alert alert-success text-center" role="alert">
                You have registered successfully
            </div>
        <div class="card-header"><h2>{{ __('Verify Your Email') }}</h2></div>

        <div class="card-body">
           

            {{ __('Before proceeding, please check your email for a verification link.') }}
           
        </div>
</div>
<div class="fxt-footer">
    <p><a href="{{ route('login') }}" class="btn switcher-text2 inline-text">{{ __('Login') }}</a> </p>
</div>
@endsection