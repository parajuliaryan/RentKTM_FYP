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
                            <h3 class="box-title">Ad Details</h3>
                            <form action="{{ route('admin.ad-requests.update', $id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                  <label for="ad_type">Ad Type</label>
                                  <input type="text" class="form-control" id="ad_type" value="{{ old('ad_type', $ad_type) }}" name="ad_type" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="user">User ID</label>
                                  <input type="text" class="form-control" id="user" value="{{ old('user_id', $user_id) }}" name="user_id" readonly>
                                </div>
                                @if ($room_id != null)
                                    <div class="form-group">
                                        <label for="room">Room ID</label>
                                        <input type="text" class="form-control" id="room" value="{{ old('room_id', $room_id) }}" name="room_id" readonly>
                                    </div>
                                @endif
                                @if ($roommate_id != null)
                                    <div class="form-group">
                                        <label for="roommate">Roommate ID</label>
                                        <input type="text" class="form-control" id="roommate" value="{{ old('roommate_id', $roommate_id) }}" name="roommate_id" readonly>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <select name="status" id="status">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="disapproved">Disapproved</option>
                                    </select>
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