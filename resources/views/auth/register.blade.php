@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@section('content')
<div class="main-div">
    <div class="register-card">
      <div class="image-holder">
        <img src="{{ asset('images/SignUp.jpg') }}" alt="image" class="img-fluid">
      </div>
      <div class="form-holder">
        <div>
          <h2>Sign Up</h2>
        </div>
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
                <button type="submit" class="btn btn-dark btn-block btn-outline btn-lg mt-3 sign-up-btn">Sign Up</button>
            </div>
            <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
              </div>
              <a class="btn btn-lg btn-block social-btn facebook mb-3" href="{{ route('facebook') }}" role="button">
                <i class="fab fa-facebook-f"></i> Continue with Facebook</a>
              <a class="btn btn-lg btn-block social-btn google" href="{{ route('google') }}" role="button">
                <i class="fab fa-google"></i> Continue with Google</a>
        </form>
      </div>
    </div>
</div>
@endsection
