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
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>{{ $roommate_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Age</th>
                                        <td>{{ $roommate_age }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Rent Price</th>
                                        <td>{{ $roommate_rent_price }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{{ $roommate_description }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Features</th>
                                        <td>{{ $roommate_features }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contact</th>
                                        <td>{{ $contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">City</th>
                                        <td>{{ $city }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ward</th>
                                        <td>{{ $ward }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Area</th>
                                        <td>{{ $area }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tole</th>
                                        <td>{{ $tole }}</td>
                                    </tr>
                                </tbody>
                              </table>
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