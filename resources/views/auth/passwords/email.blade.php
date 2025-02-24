@extends('auth.master')

@section('title', 'Forgot Password')

@section('content')
    <form id="sign_in" method="POST" action="{{ route('password.email') }}">

        @csrf

        <div class="msg">Request password reset link</div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>

            <div class="form-line">
                <input type="email" class="form-control" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button class="btn btn-block bg-pink waves-effect" type="submit">
            SEND RESET LINK
        </button>

        <hr>

        <a href="{{ route('login') }}">
            Back to login
        </a>
    </form>
@endsection
