@include('layouts.app')
@include('layouts.nav')
<div class="main-container">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(count($errors) > 0)
    <div class="p-1">
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button
                type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>
        @endforeach
    </div>
    @endif
</div>
<form action="{{ route('post-ads.rooms.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="roommate_name">Roommate Name</label>
        <input type="text" class="form-control" id="roommate_name" name="roommate_name" placeholder="Roommate Name">
    </div>
    <div class="form-group">
        <label for="roommate_age">Roommate Age</label>
        <input type="text" class="form-control" id="roommate_age" name="roommate_age" placeholder="Roommate Age">
    </div>
    <div class="form-group">
        <label for="roommate_price">Roommate Price (Per Month)</label>
        <input type="text" class="form-control" id="roommate_rent_price" name="roommate_rent_price"
            placeholder="Roommate Price">
    </div>
    <div class="form-group">
        <label for="roommate_description">Roommate Description</label>
        <textarea class="form-control" id="roommate_description" name="roommate_description"
            placeholder="Roommate Description"></textarea>
    </div>
    <div class="form-group">
        <label for="roommate_features">Roommate Features</label>
        <textarea class="form-control" id="roommate_features" name="roommate_features"
            placeholder="Roommate Features"></textarea>
    </div>
    <select name="gender" class="form-control" id="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <div class="form-group">
        <label for="contact_number">Contact Number</label>
        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number">
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="City">
    </div>
    <div class="form-group">
        <label for="ward">Ward</label>
        <input type="text" class="form-control" id="ward" name="ward" placeholder="Ward">
    </div>
    <div class="form-group">
        <label for="area">Area</label>
        <input type="text" class="form-control" id="area" name="area" placeholder="Area">
    </div>
    <div class="form-group">
        <label for="tole">Tole</label>
        <input type="text" class="form-control" id="tole" name="tole" placeholder="Tole">
    </div>
    <div class="form-group">
        <label for="roommate_image">Upload your photo</label><br>
        <input type="file" name="roommate_image" id="roommate_image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>