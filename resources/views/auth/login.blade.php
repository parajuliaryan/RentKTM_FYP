@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@section('content')
<div class="container d-flex wrapper">
    <div class="container image-holder">
        <img src="{{ asset('images/SignIn.jpg') }}" class="login-img">
    </div>
    <div class="container form-holder">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
            </li>
        </ul>
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="exampleInputPassword1" placeholder="Password" name="password" required
                    autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
                @endif
                <br>
                <button type="submit" class="btn btn-dark btn-block btn-outline btn-lg mt-3">Sign In</button>
            </div>
            <div class="or-container">
                <div class="line-separator"></div>
                <div class="or-label">or</div>
                <div class="line-separator"></div>
            </div>
            <div class="row">
                <div class="col-md-12"> <a class="btn btn-lg btn-social btn-block btn-outline text-center" href="#"><img
                            src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-facebook-social-media-justicon-flat-justicon.png"
                            class="logo-img" /> Continue With Facebook</a> </div>
            </div><br>
            <div class="row">
                <div class="col-md-12"> <a class="btn btn-lg btn-social btn-block btn-outline" href="#"><img
                            src="https://img.icons8.com/color/16/000000/google-logo.png" class="logo-img"> Continue With
                        Google</a> </div>
            </div>
        </form>
    </div>
</div>
@endsection