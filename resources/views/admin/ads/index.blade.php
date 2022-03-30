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
                        <h4 class="page-title">ADS</h4>
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
                            <h3 class="box-title">Ads List</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Ad ID</th>
                                            <th class="border-top-0">Ad Type</th>
                                            <th class="border-top-0">User Name</th>
                                            <th class="border-top-0">Room ID</th>
                                            <th class="border-top-0">Roomate ID</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ads as $ad)
                                        <tr>
                                            <td>{{ $ad->id }}</td>
                                            <td>{{ $ad->ad_type }}</td>
                                            <td>{{ $ad->user->first_name .' '. $ad->user->last_name }}</td>
                                            @if ($ad->room != null)
                                            <td>{{ $ad->room->id }}</td>
                                            @else
                                            <td>null</td>
                                            @endif
                                            @if ($ad->roommate != null)
                                            <td>{{ $ad->roommate->id }}</td>
                                            @else
                                            <td>null</td>
                                            @endif
                                            <td>{{ $ad->status }}</td>
                                            <td>
                                                @if ($ad->room != null)
                                                    <a href="{{ route('admin.rooms.show', $ad->room->id) }}"><i class="fa fa-eye"></i></a>
                                                @endif
                                                @if ($ad->roommate != null)
                                                    <a href="{{ route('admin.roommates.show', $ad->roommate->id) }}"><i class="fa fa-eye"></i></a>
                                                @endif
                                                    <a href="{{ route('admin.ads.edit', $ad->id) }}"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>               
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
