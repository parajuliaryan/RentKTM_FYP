@include('layouts.app')
@include('layouts.nav')
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
    <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button
            type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>
    @endforeach
</div>
@endif
<div class="main-container">
<form action="{{ route('post-ads.rooms.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="room_description">Room Description</label>
        <textarea class="form-control" id="room_description" name="room_description" placeholder="Room Description"></textarea>
    </div>
    <div class="form-group">
        <label for="room_price">Room Price</label>
        <input type="text" class="form-control" id="room_price" name="room_price" placeholder="Room Price">
    </div>
    <div class="form-group">
        <label for="room_type">Room Type</label>
        <input type="text" class="form-control" id="room_type" name="room_type" placeholder="Room Type (Eg: 1BHK, 2BHK etc.)">
    </div>
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
        <label for="room_images">Upload Image(s)</label>
        <input type="file" name="room_images[]" multiple id="room_image">
    </div>  
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@include('layouts.footer')