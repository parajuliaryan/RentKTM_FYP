@include('layouts.nav')
@include('admin.backend-imports')
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
                        <h4 class="page-title">List of Roommates</h4>
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
                            <h3 class="box-title">Roommate Details</h3>
                            <form action="{{ route('admin.roommates.store') }}" method="POST">
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
                                  <input type="text" class="form-control" id="roommate_rent_price" name="roommate_rent_price" placeholder="Roommate Price">
                                </div>
                                <div class="form-group">
                                    <label for="roommate_description">Roommate Description</label>
                                    <textarea class="form-control" id="roommate_description" name="roommate_description" placeholder="Roommate Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="roommate_features">Roommate Features</label>
                                    <textarea class="form-control" id="roommate_features" name="roommate_features" placeholder="Roommate Features"></textarea>
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