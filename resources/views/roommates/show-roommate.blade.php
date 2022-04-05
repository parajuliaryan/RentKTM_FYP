@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/show-roommate.css') }}">
<div class="main-container">
  <div class="wrapper mt-3 mb-3">
      <div class="image-wrapper">
        <div class="roommate-heading">
          <h2>{{ $roommate->roommate_name }}</h2>
          <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $roommate->city.'-'.$roommate->ward.', '.$roommate->area.', '.$roommate->tole }}</p></span>
        </div>
        <div class="roommate-image">
          <img src="{{ asset('images/'.$roommate->roommate_image) }}" alt="roommate-image" class="img-fluid">
        </div>
        <div class="about-roommate">
          <h3>About the roommate</h3>
          <p>{{ $roommate->roommate_description }}</p>
        </div>
        <div class="roommate-features">
          <h3>Roommate's Features</h3>
          @foreach ($features as $feature)
          <p>{{ $feature->feature }}</p>    
          @endforeach
        </div>
      </div>
    <div class="text-contents">
      <div class="ad-posted">
        <h4>Ad posted by</h4>
        <p>{{ $ads->user->first_name . ' ' . $ads->user->last_name }}</p> 
      </div>
      <div class="roommate-price">
        <h4>Rent Price</h4>
        <p>Nrs.{{ $roommate->roommate_rent_price }}/month </p> 
      </div>
      <div class="contact-number">
        <h4>For Enquiry</h4>
        <p> {{ $roommate->contact_number }}</p>
      </div>
      <div class="roommate-gender">
        <h4>Gender</h4>
        <p>{{ strtoupper($roommate->gender) }}</p>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')