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
                        <h4 class="page-title">Edit Rooms</h4>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Room Details</h3>
                            <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select name="user_type" class="form-control" id="usertype" required>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="room_description">Room Description</label>
                                  <textarea class="form-control" id="room_description" name="room_description" placeholder="Room Description"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="room_price">Room Price</label>
                                  <input type="text" class="form-control" value="{{ old('room_price', $room->room_price) }}" id="room_price" name="room_price" placeholder="Room Price">
                                </div>
                                <div class="form-group">
                                    <label for="room_type">Room Type</label>
                                    <input type="text" class="form-control" value="{{ old('room_type', $room->room_type) }}" id="room_type" name="room_type" placeholder="Room Type (Eg: 1BHK, 2BHK etc.)">
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control" value="{{ old('contact_number', $room->contact_number) }}" id="contact_number" name="contact_number" placeholder="Contact Number">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" value="{{ old('city', $room->city) }}" id="city" name="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <label for="ward">Ward</label>
                                    <input type="text" class="form-control" value="{{ old('ward', $room->ward) }}" id="ward" name="ward" placeholder="Ward">
                                </div>
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <input type="text" class="form-control" id="area" value="{{ old('area', $room->area) }}" name="area" placeholder="Area">
                                </div>
                                <div class="form-group">
                                    <label for="tole">Tole</label>
                                    <input type="text" class="form-control" id="tole" value="{{ old('tole', $room->tole) }}" name="tole" placeholder="Tole">
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