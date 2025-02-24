@extends('auth.master')

@section('title', 'Reset Password')

@section('content')
    <form id="sign_in" method="POST" action="{{ route('password.update') }}">

        @csrf

        <div class="msg">Provide a new password</div>

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>

            <div class="form-line">
                <input type="email" class="form-control" name="email" placeholder="E-mail Address" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            </div>

            @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>

            <div class="form-line">
                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="new-password">
            </div>
            
            @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>

            <div class="form-line">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            </div>
        </div>

        <button class="btn btn-block bg-pink waves-effect" type="submit">
            RESET PASSWORD
        </button>
    </form>
@endsection
