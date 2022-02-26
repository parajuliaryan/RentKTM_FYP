@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/profile.css') }}">
<div class="holder">
  <div class="user-info">
    <div class="image-container">
      <img src="{{ asset('images/user-avatar.png') }}" class="img-fluid" alt="user-avatar">
    </div>
    <div class="text-container">
      <div class="user-details">
        <h3>Name: {{ $user->first_name .' ' . $user->last_name }}</h3>
        <h5>Email: {{ $user->email }}</h5>
        <h5>Type: {{ strtoupper($user->user_type )}}</h5>
      </div>
      <div class="edit-btn">
        <span>Edit Profile <a href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit"></i></a></span>
      </div>
    </div>
  </div>
  <div class="ad-container">
    <div class="ad-topic">
      <h3>Posted ads</h3>
    </div>
    @foreach ($ads as $ad)
    <div class="ad">
      @if ($ad->roommate != null)
      <div class="ad-image">
        <img src="{{ asset('images').'/'.$ad->roommate->roommate_image }}" class="img-fluid" alt="user-avatar">
      </div>
      <div class="ad-about">
        <p>{{ $ad->roommate->roommate_name }}, {{ $ad->roommate->roommate_age }}</p>
        <p>{{ $ad->roommate->city.','. $ad->roommate->ward .','. $ad->roommate->area .','. $ad->roommate->tole }}
        </p>
        <p>Nrs. {{ $ad->roommate->roommate_rent_price }}/month</p>
        <p>{{ $ad->roommate->roommate_description }}</p>
        <p>{{ $ad->roommate->roommate_features }}</p>
        <p>{{ $ad->roommate->gender }}</p>
        <p>{{ $ad->roommate->contact_number }}</p>
      </div>
        @else
        <div class="ad-image">
          <img src="{{ asset('images/user-avatar.png') }}" class="img-fluid" alt="user-avatar">
        </div>
        <div class="ad-about">
        <h3>{{ $ad->room->room_type }}</h3>
        <p>{{ $ad->room->room_description }}</p>
        <p>{{ $ad->room->room_price }}</p>
        <p>{{ $ad->room->contact_number }}</p>
        <p>{{ $ad->room->city.','. $ad->room->ward .','. $ad->room->area .','. $ad->room->tole }}</p>
        </div>
        @endif
    </div>
    @endforeach
  </div>
</div>