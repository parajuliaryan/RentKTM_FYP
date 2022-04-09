@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/room-ads.css') }}">
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
    <div class="room-ad-holder">
        <div class="image-holder">
            <img src="{{ asset('images/room-ads.jpg') }}" alt="image" class="img-fluid">
        </div>
        <div class="form-holder">
            <form action="{{ route('post-ads.rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="room_title">Room Title</label>
                    <input type="text" class="form-control" id="room_title" name="room_title" placeholder="Room Title">
                </div>
                <div class="form-group">
                    <label for="room_description">Room Description</label>
                    <textarea class="form-control" id="room_description" name="room_description"
                        placeholder="Room Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="room_price">Room Price</label>
                    <input type="text" class="form-control" id="room_price" name="room_price"
                        placeholder="Room Price (per month)">
                </div>
                <div class="form-group">
                    <label for="student_price">Student Price</label>
                    <input type="text" class="form-control" id="student_price" name="student_price"
                        placeholder="Price for Students">
                </div>
                <div class="form-group d-flex flex-column">
                    <label for="room_type">Room Type</label>
                    <select name="room_type" id="room_type" style="width: 20%;">
                        @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->room_type }}">{{ $roomType->room_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number"
                        placeholder="Contact Number">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')