@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@section('content')
<div class="container d-flex wrapper">
    <div class="container image-holder">
        <img src="{{ asset('images/SignUp.jpg') }}" class="register-img">
    </div>
    <div class="container form-holder">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('register') }}">Sign Up</a>
            </li>
        </ul>
        <form method="POST" action="{{ route('register') }}" class="register-form d-flex flex-column">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="exampleInputPassword1" placeholder="Password" name="password" required
                    autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="student-check" id="student-check" {{ old('student-check')
                    ? 'checked' : '' }}>
                <label class="form-check-label" for="student-check">
                    {{ __('I am a Student') }}
                </label>
            </div>
            <div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
                @endif
                <br>
                <button type="submit" class="btn btn-dark btn-block btn-outline btn-lg mt-3 btn-signup">Sign Up</button>
            </div>
            <div class="or-container">
                <div class="line-separator"></div>
                <div class="or-label">or</div>
                <div class="line-separator"></div>
            </div>
            <div class="row">
                <div class="col-md-12"> <a class="btn btn-lg btn-social btn-block btn-outline text-center" href="{{ route('facebook') }}"><img
                            src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-facebook-social-media-justicon-flat-justicon.png"
                            class="logo-img" /> Continue With Facebook</a> </div>
            </div><br>
            <div class="row">
                <div class="col-md-12"> <a class="btn btn-lg btn-social btn-block btn-outline" href="{{ route('google') }}"><img
                            src="https://img.icons8.com/color/16/000000/google-logo.png" class="logo-img"> Continue With
                        Google</a> </div>
            </div>
        </form>
    </div>
</div>
@endsection
