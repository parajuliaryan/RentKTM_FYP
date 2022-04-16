@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@section('content')
<div class="main-div">
    <div class="login-card">
      <div class="image-holder">
        <img src="{{ asset('images/SignIn.jpg') }}" alt="image" class="img-fluid">
      </div>
      <div class="form-holder">
        <div>
          <h2>Sign In</h2>
        </div>
        <form method="POST" action="{{ route('login') }}" class="form-container">
            @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
            aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="{{ old('email') }}"
            required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror mb-2"
            id="exampleInputPassword1" placeholder="Password" name="password" required
            autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" onclick="myFunction()">
            <label for="check-password">Show Password</label>
            <br>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
          <div class="form-group">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Password?') }}
            </a>
            @endif
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block sign-in-btn mb-2">Sign In</button>
          </div>
          <p>Don't Have an Account? <a href="{{ route('register') }}">Create One</a></p>
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
<script>
function myFunction() {
  var x = document.getElementById("exampleInputPassword1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection