@include('layouts.app')
@include('layouts.nav')
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
        <input type="text" class="form-control" id="email" name="email"
            value="{{ old('email', $email) }}" placeholder="Email Address">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>