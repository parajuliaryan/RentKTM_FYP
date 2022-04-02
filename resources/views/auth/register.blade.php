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
            <form method="POST" action="{{ route('register') }}" class="register-form d-flex flex-column" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                        name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus
                        placeholder="First Name">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus
                        placeholder="Last Name">
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
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="student_check" id="student_check" {{
                        old('student-check') ? 'checked' : '' }}>
                    <label class="form-check-label" for="student-check">
                        {{ __('I am a Student') }}
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-dark btn-block btn-outline btn-lg mt-3 sign-up-btn" id="signup_btn">Sign
                        Up</button>
                </div>
                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>
                <a class="btn btn-lg btn-block social-btn facebook mb-3" href="{{ route('facebook') }}" role="button">
                    <i class="fab fa-facebook-f"></i> Continue with Facebook</a>
                <a class="btn btn-lg btn-block social-btn google" href="{{ route('google') }}" role="button">
                    <i class="fab fa-google"></i> Continue with Google</a>                   
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload a proper identification document</h5>
                            <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close" id="cross_btn" style="max-width: 50px;">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="identification">Upload your photo</label><br>
                                    <span class="text-danger" id="upload_warning">Cannot Proceed until a file is uploaded</span>
                                    <input type="file" name="identification" id="identification">
                                </div>
                            </div>
                            <div class="modal-footer d-flex flex-column">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_btn">Close</button>
                                <button type="submit" class="btn btn-primary" id="save_btn">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
<script>
        $('#signup_btn').click(function (e) {
            if ($('#student_check').is(":checked")) {
                e.preventDefault();
                $('#exampleModal').modal('toggle');
                $('#save_btn').attr('disabled',true);
                $('input:file').change(
                    function(){
                        if ($(this).val()){
                            $('#save_btn').removeAttr('disabled');
                            $('#upload_warning').addClass('d-none'); 
                        }
                        else {
                            $('#save_btn').attr('disabled',true);
                            $('#upload_warning').removeClass('d-none'); 
                        }
                    });
            }
        });

        $('#close_btn').click(function (e){
            $('#exampleModal').modal('hide');
        });

        $('#cross_btn').click(function (e){
            $('#exampleModal').modal('hide');
        });
</script>
@endsection