@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/post-ads.css') }}">
<div class="main-container">
    <div class="room-ad-container">
        <img src="{{ asset('images/rooms.jpg') }}" class="img-fluid" alt="Rent Room">
        <a href="{{ route('post-ads.rooms.create') }}" class="centered">Advertisement for a Room</a>
    </div>
    <div class="roommate-ad-container">
        <img src="{{ asset('images/roommates.jpg') }}" class="img-fluid" alt="Roommate Available">
        <a href="{{ route('post-ads.roommates.create') }}" class="centered alternate">Advertisement for a Roommate</a>
    </div>
</div>
@include('layouts.footer')

