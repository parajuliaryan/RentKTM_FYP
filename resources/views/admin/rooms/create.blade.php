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
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Create Rooms</h4>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            @if(count($errors) > 0)
            <div class="p-1">
                @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button type="button"
                        class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>
                @endforeach
            </div>
            @endif
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Room Details</h3>
                        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="room_title">Room Title</label>
                                <input type="text" class="form-control" id="room_title" name="room_title"
                                    placeholder="Room Title">
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
                                    placeholder="Student Price">
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