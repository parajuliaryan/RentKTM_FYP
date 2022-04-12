@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/frontend-css/home.css') }}">
@section('content')
@include('layouts.nav')
<div class="main-section">
    <div class="container-fluid image-container px-0">
        <div class="slogan">
            <span>Find a Room in Kathmandu</span>
            <p>RentKTM helps you find the best rooms in Kathmandu with like-minded people as roommates.</p>
        </div>
        <img src="{{ asset('images/home.jpg') }}" class="img-fluid">
    </div>
    <div class="search-box form-group d-flex flex-direction-column justify-content-center align-items-center">
        <form action="{{ route('search-items') }}">
            <div class="form-group search-group">
                <input type="search" name="search" id="search" placeholder="Search by Location">
                <button type="submit">Search</button>
            </div>
            <div class="form-group radio-group mx-3 my-3 p-2">
                <div class="room-radio">
                    <input type="radio" name="search-value" id="rooms" value="rooms">
                    <label for="rooms">Rooms</label>
                </div>
                <div class="roommate-radio">
                    <input type="radio" name="search-value" id="roommates" value="roommates">
                    <label for="roommmates">Roommates</label>
                </div>
            </div>
        </form>
    </div>
    <div class="popular-rooms mb-3">
        <div class="popular-rooms-heading">
            <h2>Popular Rooms in Kathmandu</h2>
            <div></div>
        </div>
        <div class="cards-wrapper d-flex justify-content-between w-100 flex-wrap">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">Name of Room</p>
                    <p class="card-text d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="top-areas">
        <h2>Top Areas in Kathmandu</h2>
        <div class="cards-wrapper d-flex justify-content-between w-100">
            <a href="#" style="text-decoration: none">
                <div class="card area-card" style="width: 14rem;">
                    <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Koteshwor</h5>
                    </div>
                </div>
            </a>

            <a href="#" style="text-decoration: none">
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Baneshwor</h5>
                </div>
            </div>
            </a>

            <a href="#" style="text-decoration: none">
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">New Road</h5>
                </div>
            </div>
            </a>

            <a href="#" style="text-decoration: none">
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Dillibazar</h5>
                </div>
            </div>
            </a>

            <a href="#" style="text-decoration: none">
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Sinamangal</h5>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="discover-features">
        <h2>Discover Our Features</h2>
        <div class="d-flex justify-content-between features-holder">
            <div class="image-holder">
                <img src="{{ asset('images/find-rooms.jpg') }}" alt="Find Rooms">
                <a href="{{ route('rooms') }}" class="btn">Find Rooms</a>
            </div>
            <div class="image-holder">
                <img src="{{ asset('images/find-roommates.jpg') }}" alt="Find Roommates">
                <a href="{{ route('roommates') }}" class="btn">Find Roommates</a>
            </div>
        </div>
    </div>

    <div class="room-holder">
        <div class="room-image-holder">
            <img src="{{ asset('images/post-ads.jpg') }}" alt="Post an Ad">
            <a href="{{ route('post-ads.index') }}" class="btn">Post an Ad</a>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection