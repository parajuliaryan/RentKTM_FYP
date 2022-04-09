@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/roommate-ads.css') }}">
@section('content')
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
    <div class="roommate-ad-holder">
        <div class="image-holder">
            <img src="{{ asset('images/roommate-ads.jpg') }}" alt="image" class="img-fluid">
        </div>
        <div class="form-holder">
            <form action="{{ route('post-ads.roommates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="roommate_name">Roommate Name</label>
                    <input type="text" class="form-control" id="roommate_name" name="roommate_name"
                        placeholder="Roommate Name">
                </div>
                <div class="form-group">
                    <label for="roommate_age">Roommate Age</label>
                    <input type="text" class="form-control" id="roommate_age" name="roommate_age"
                        placeholder="Roommate Age">
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
                    <label for="roommate_image">Upload your photo</label><br>
                    <input type="file" name="roommate_image" id="roommate_image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
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