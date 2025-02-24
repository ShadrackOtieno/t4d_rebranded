@extends('auth.master')

@section('title', 'Verify E-mail Address')

@section('content')
    <form id="sign_in" method="POST" action="{{ route('verification.resend') }}">

        @csrf

        <div class="msg">
            Verify your email address
        </div>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},

        <button class="btn btn-block bg-pink waves-effect" type="submit">
            click here to request another
        </button>
    </form>
@endsection
