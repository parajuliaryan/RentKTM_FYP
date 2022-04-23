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
                            <h3 class="box-title">Room Details</h3>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{ $room->room_title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{{ $room->room_description }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Room Type</th>
                                        <td>{{ $room->room_type }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td>{{ $room->room_price }}</td>
                                    </tr>
                                    @if ($room->student_price != null)
                                        <tr>
                                            <th scope="row">Price for Students</th>
                                            <td>{{ $room->student_price }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">Contact</th>
                                        <td>{{ $room->contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">City</th>
                                        <td>{{ $room->city }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ward</th>
                                        <td>{{ $room->ward }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Area</th>
                                        <td>{{ $room->area }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tole</th>
                                        <td>{{ $room->tole }}</td>
                                    </tr>
                                </tbody>
                              </table>
                              @php
                                  $image = explode('|',$images->image_url);
                              @endphp
                              @foreach ($image as $item )
                                <img src="{{ URL::to($item) }}" style ="height:60px;width:60px;">
                              @endforeach
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