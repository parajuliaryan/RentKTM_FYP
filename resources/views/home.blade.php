@extends('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/home.css') }}">
@section('content')
<div class="main-section">
    <div class="container-fluid image-container px-0">
        <div class="slogan">
            <span>Find a Room in Kathmandu</span>
            <p>RentKTM helps you find the best rooms in Kathmandu with like-minded people as roommates.</p>
        </div>
        <img src="{{ asset('images/home.jpg') }}" class="img-fluid">
    </div>
    <div class="search-box form-group d-flex flex-direction-column justify-content-center align-items-center">
        <form action="/">
            <div class="form-group search-group">
                <input type="text" name="search" id="search" placeholder="Search">
                <button type="submit">Search</button>
            </div>
            <div class="form-group radio-group mx-3 my-3 p-2">
                <div class="room-radio">
                    <input type="radio" name="rooms" id="rooms">
                    <label for="rooms">Rooms</label>
                </div>
                <div class="roommate-radio">
                    <input type="radio" name="roommates" id="roommates">
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
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Name of Room</p>
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Name of Room</p>
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Name of Room</p>
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Name of Room</p>
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Name of Room</p>
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Name of Room</p>
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/room4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Name of Room</p>
                  <p class="card-text d-flex justify-content-between"><span>Location</span><span>Nrs.12000/month</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="top-areas">
        <h2>Top Areas in Kathmandu</h2>
        <div class="cards-wrapper d-flex justify-content-between w-100">
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">New Road</h5>
                </div>
            </div>
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">New Road</h5>
                </div>
            </div>
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">New Road</h5>
                </div>
            </div>
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">New Road</h5>
                </div>
            </div>
            <div class="card area-card" style="width: 14rem;">
                <img class="card-img-top" src="{{ asset('images/new road.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">New Road</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="discover-features">
        <h2>Discover Our Features</h2>
        <div class="d-flex justify-content-between">
            <div class="image-holder">
                <img src="{{ asset('images/post-ads.jpg') }}" alt="Post an Ad">
                <a href="{{ route('postAds') }}" class="btn">Post an Ad</a>
            </div>
            <div class="image-holder">
                <img src="{{ asset('images/find-roommates.jpg') }}" alt="Find Roommates">
                <a href="{{ route('postAds') }}" class="btn btn-primary">Find Roommates</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="page-footer d-flex">
            <div class="d-flex flex-column align-items-start justify-content-start w-50">
                <h5>Support</h5>
                <div class="footer-links holder">
                    <p><a href="#">Contact Us</a></p>
                    <p><a href="#">Help Center</a></p>
                    <p><a href="#">Safety Information</a></p>
                    <p><a href="#">Covid-19 Resources</a></p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-start justify-content-start w-50">
                <h5>About</h5>
                <div class="footer-links holder">
                    <p><a href="#">About Us</a></p>
                    <p><a href="#">Sponsors</a></p>
                    <p><a href="#">Privacy Policy</a></p>
                    <p><a href="#">Terms and Conditions</a></p>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="sub-footer d-flex justify-content-between">
            <div class="footer-logo">
                <p>&copy; 2022 <span>RentKTM</span>, All Rights Reserved.</p>
            </div>
            <div class="social-icons-holder">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</div>
@endsection
