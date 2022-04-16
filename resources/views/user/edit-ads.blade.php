@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/edit-ads.css') }}">
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
        @if ($ad->room_id != null)
        <form action="{{ route('user.ads.update', $ad->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="room_title">Room Title</label>
                <input type="text" class="form-control" value="{{ old('room_title', $ad->room->room_title) }}"
                    id="room_title" name="room_title" placeholder="Room Title">
            </div>
            <div class="form-group">
                <label for="room_description">Room Description</label>
                <textarea class="form-control" id="room_description" name="room_description"
                    placeholder="Room Description"></textarea>
            </div>
            <div class="form-group">
                <label for="room_price">Room Price</label>
                <input type="text" class="form-control" value="{{ old('room_price', $ad->room->room_price) }}"
                    id="room_price" name="room_price" placeholder="Room Price">
            </div>
            <div class="form-group">
                <label for="student_price">Student Price</label>
                <input type="text" class="form-control" value="{{ old('student_price', $ad->room->student_price) }}"
                    id="student_price" name="student_price" placeholder="Student Price">
            </div>
            <div class="form-group d-flex flex-column">
                <label for="room_type">Room Type</label>
                <select name="room_type" id="room_type" style="width: 60%;">
                    @foreach ($roomTypes as $roomType)
                    <option value="{{ $roomType->room_type }}">{{ $roomType->room_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" value="{{ old('contact_number', $ad->room->contact_number) }}"
                    id="contact_number" name="contact_number" placeholder="Contact Number">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" value="{{ old('city', $ad->room->city) }}" id="city" name="city"
                    placeholder="City">
            </div>
            <div class="form-group">
                <label for="ward">Ward</label>
                <input type="text" class="form-control" value="{{ old('ward', $ad->room->ward) }}" id="ward" name="ward"
                    placeholder="Ward">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" class="form-control" id="area" value="{{ old('area', $ad->room->area) }}" name="area"
                    placeholder="Area">
            </div>
            <div class="form-group">
                <label for="tole">Tole</label>
                <input type="text" class="form-control" id="tole" value="{{ old('tole', $ad->room->tole) }}" name="tole"
                    placeholder="Tole">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @else
        <form action="{{ route('user.ads.update', $ad->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="roommate_name">Roommate Name</label>
                <input type="text" class="form-control" id="roommate_name"
                    value="{{ old('roommate_name', $ad->roommate->roommate_name) }}" name="roommate_name"
                    placeholder="Roommate Name">
            </div>
            <div class="form-group">
                <label for="roommate_age">Roommate Age</label>
                <input type="text" class="form-control" id="roommate_age"
                    value="{{ old('roommate_age', $ad->roommate->roommate_age) }}" name="roommate_age"
                    placeholder="Roommate Age">
            </div>
            <div class="form-group">
                <label for="roommate_price">Roommate Price (Per Month)</label>
                <input type="text" class="form-control" id="roommate_rent_price"
                    value="{{ old('roommate_rent_price', $ad->roommate->roommate_rent_price) }}" name="roommate_rent_price"
                    placeholder="Roommate Price">
            </div>
            <div class="form-group">
                <label for="roommate_description">Roommate Description</label>
                <textarea class="form-control" id="roommate_description" name="roommate_description"
                    placeholder="Roommate Description"></textarea>
            </div>
            <div class="form-group features">
                <label for="roommate_feature">Roommate Feature</label>
                <input type="text" name="roommate_feature[]" class="form-control"
                    placeholder="Add Feature (Eg: Non-Smoker)" value="" maxlength="255" />
                <button type="button" class="btn btn-warning addMore">New Feature</button>
            </div>
            <select name="gender" class="form-control" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number"
                    value="{{ old('contact_number', $ad->roommate->contact_number) }}" name="contact_number"
                    placeholder="Contact Number">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" value="{{ old('city', $ad->roommate->city) }}" name="city"
                    placeholder="City">
            </div>
            <div class="form-group">
                <label for="ward">Ward</label>
                <input type="text" class="form-control" id="ward" value="{{ old('ward', $ad->roommate->ward) }}" name="ward"
                    placeholder="Ward">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" class="form-control" id="area" value="{{ old('area', $ad->roommate->area) }}" name="area"
                    placeholder="Area">
            </div>
            <div class="form-group">
                <label for="tole">Tole</label>
                <input type="text" class="form-control" id="tole" value="{{ old('tole', $ad->roommate->tole) }}" name="tole"
                    placeholder="Tole">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endif
    </div>
</div>
@include('layouts.footer')
<script type="text/javascript">
    $(document).ready(function () {
        console.log('Document works');
        var addButton = $('.addMore'); //Add button selector
        var wrapper = $('.features'); //Input field wrapper
        var fieldHTML = 
        '<div class="form-group features">'+
            '<label for="roommate_feature">Roommate Feature</label>'+
            '<input type="text" name="roommate_feature[]" class="form-control" placeholder="Add Feature (Eg: Non-Smoker)" value="" maxlength="255" />'+
            '<button type="button" class="btn btn-warning addMore">New Feature</button>'+
            '<button type="button" class="btn btn-danger remove_button"><i class="fa fa-trash"></i></button>'+
        '</div>';    

        var x = 1; //Initial field counter is 1
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

        //Once add button is clicked
        $(wrapper).on('click', '.addMore', function (e) {
            e.preventDefault();
            $(wrapper).append(fieldHTML);
            x++; //Increment field counter
        }); 
                   
        });
</script>