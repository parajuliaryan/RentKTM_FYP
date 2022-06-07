@include('admin.backend-imports')
@include('admin.nav')
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('admin.sidemenu')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Roommate Details</h3>
                        <form action="{{ route('admin.roommates.update', $roommate->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="roommate_name">Roommate Name</label>
                                <input type="text" class="form-control" id="roommate_name"
                                    value="{{ old('roommate_name', $roommate->roommate_name) }}" name="roommate_name"
                                    placeholder="Roommate Name">
                            </div>
                            <div class="form-group">
                                <label for="roommate_age">Roommate Age</label>
                                <input type="text" class="form-control" id="roommate_age"
                                    value="{{ old('roommate_age', $roommate->roommate_age) }}" name="roommate_age"
                                    placeholder="Roommate Age">
                            </div>
                            <div class="form-group">
                                <label for="roommate_price">Roommate Price (Per Month)</label>
                                <input type="text" class="form-control" id="roommate_rent_price"
                                    value="{{ old('roommate_rent_price', $roommate->roommate_rent_price) }}"
                                    name="roommate_rent_price" placeholder="Roommate Price">
                            </div>
                            <div class="form-group">
                                <label for="roommate_description">Roommate Description</label>
                                <textarea class="form-control" id="roommate_description" name="roommate_description"
                                    placeholder="Roommate Description">{{ $roommate->roommate_description }}</textarea>
                            </div>
                            {{-- <div class="form-group features">
                                <label for="roommate_feature">Roommate Feature</label>
                                <input type="text" name="roommate_feature[]" class="form-control"
                                    placeholder="Add Feature (Eg: Non-Smoker)" value="" maxlength="255" />
                                <button type="button" class="btn btn-warning addMore">New Feature</button>
                            </div> --}}
                            <div class="form-group features">
                                <label for="">Roommate Feature</label>
                                @for ($i=0;$i < count($features);$i++) 
                                
                                    <input type="text" class="form-control" name="roommate_feature[{{ $i }}]"
                                            placeholder="Add Feature (Eg: Non-Smoker)" value="{{ $features[$i]->feature }}">
                              
                                    @if ($i == count($features)-1)
                                    {{-- <button type="button" class="btn btn-warning addMore">New Feature</button> --}}
                                    @endif
                                @endfor
                            </div>
                            <select name="gender" class="form-control" id="gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number"
                                    value="{{ old('contact_number', $roommate->contact_number) }}" name="contact_number"
                                    placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city"
                                    value="{{ old('city', $roommate->city) }}" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <input type="text" class="form-control" id="ward"
                                    value="{{ old('ward', $roommate->ward) }}" name="ward" placeholder="Ward">
                            </div>
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" class="form-control" id="area"
                                    value="{{ old('area', $roommate->area) }}" name="area" placeholder="Area">
                            </div>
                            <div class="form-group">
                                <label for="tole">Tole</label>
                                <input type="text" class="form-control" id="tole"
                                    value="{{ old('tole', $roommate->tole) }}" name="tole" placeholder="Tole">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @include('admin.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
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