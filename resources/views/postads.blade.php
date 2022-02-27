@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/post-ads.css') }}">
<div class="main-container">
    <div class="room-ad-container">
        <img src="{{ asset('images/rooms.jpg') }}" class="img-fluid" alt="Rent Room">
        <div class="centered">
            <a href="{{ route('post-ads.rooms.create') }}">Advertisement for a Room</a>
        </div>
    </div>
    <div class="roommate-ad-container">
        <img src="{{ asset('images/roommates.jpg') }}" class="img-fluid" alt="Roommate Available">
        <div class="centered alternate">
            <a href="{{ route('post-ads.roommates.create') }}">Advertisement for a Roommate</a>
        </div>
    </div>
</div>
@include('layouts.footer')

