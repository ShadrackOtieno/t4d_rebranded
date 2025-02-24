@extends('auth.master')

@section('title', 'Confirm Password')

@section('content')
    <form id="sign_in" method="POST" action="{{ route('password.confirm') }}">

        @csrf

        <div class="msg">Please confirm your password before continuing</div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>

            <div class="form-line">
                <input type="password" class="form-control" name="password" placeholder="Confirm Password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button class="btn btn-block bg-pink waves-effect" type="submit">
            CONFIRM PASSWORD
        </button>

        <hr>

        <a href="{{ route('password.request') }}">
            Forgot Password?
        </a>
    </form>
@endsection
