@extends('auth.master')

@section('title', 'Sign In')

@section('content')
    <form id="sign_in" method="POST" action="{{ route('login') }}">

        @csrf

        <div class="msg">Sign in to start your session</div>

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

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>

            <div class="form-line">
                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
            </div>

            @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-xs-8 p-t-5">
                <input type="checkbox" class="filled-in chk-col-pink" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">Remember Me</label>
            </div>

            <div class="col-xs-4">
                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
            </div>
        </div>

        <div class="row m-t-15 m-b--20">
            <div class="col-xs-6">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>

            <div class="col-xs-6">
                <a class="nav-link" href="{{ route('customer.account.register') }}">
                    Register as a user
                </a>
            </div>
        </div>
    </form>
@endsection
