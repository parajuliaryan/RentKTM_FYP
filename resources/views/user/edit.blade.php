@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/edit-profile.css') }}">
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(count($errors) > 0)
<div class="p-1">
    @foreach($errors->all() as $error)
    <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button type="button" class="close"
            data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>
    @endforeach
</div>
@endif
<div class="main-container">
    <div class="form-container">
        <form action="{{ route('user.update', $id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name', $first_name) }}" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name', $last_name) }}" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $email) }}"
                    placeholder="Email Address">
            </div>
            <button type="submit" class="update-btn btn">Update</button>
        </form>
    </div>
</div>
@include('layouts.footer')