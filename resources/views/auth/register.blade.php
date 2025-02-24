@extends('auth.master')

@section('title', 'Sign Up')

@section('content')
    <form id="sign_in" method="POST" action="{{ route('customer.account.register.store') }}">

        @csrf

        <div class="msg">Sign up to start your session</div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>

            <div class="form-line">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>
            </div>

            @error('first_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>

            <div class="form-line">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus>
            </div>

            @error('last_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">email</i>
            </span>

            <div class="form-line">
                <input type="email" class="form-control" name="personal_email" placeholder="Personal E-mail" value="{{ old('email') }}" required autocomplete="email">
            </div>

            @error('personal_email')
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
                <input type="password" class="form-control" name="password" placeholder="Password" required>
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
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button class="btn btn-block bg-pink waves-effect" type="submit">
            SIGN UP
        </button>

        <div class="row m-t-15 m-b--20">
            <div class="col-xs-12">
                Already have an account?
                <a href="{{ route('login') }}">
                    login
                </a>
            </div>
        </div>
    </form>
@endsection
