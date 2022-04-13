@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/profile.css') }}">
<div class="main-container">
  <div class="user-info">
    <div class="image-container">
      <img src="{{ asset('images/user-avatar.png') }}" class="img-fluid" alt="user-avatar">
    </div>
    <div class="text-container">
      <div class="user-details">
        <h3>{{ $user->first_name .' ' . $user->last_name }}</h3>
        <h5>{{ $user->email }}</h5>
        <h5>{{ strtoupper($user->user_type )}}</h5>
        <a href="{{ route('my-chats', $user->id) }}">My Messages</a>
      </div>
      <div class="edit-btn">
        <a href="{{ route('user.edit', $user->id) }}" class="btn edit-button">Edit Profile <i
            class="fa fa-edit"></i></a>
      </div>
    </div>
  </div>
  <div class="ad-container">
    <div class="ad-topic">
      <h3>My ads</h3>
    </div>
    @foreach ($ads as $ad)
    <div class="ad">
      @if ($ad->roommate != null)
      <div class="ad-image">
        <img src="{{ asset('images').'/'.$ad->roommate->roommate_image }}" class="img-fluid" alt="user-avatar">
      </div>
      <div class="ad-about">
        <h3>{{ $ad->roommate->roommate_name }}, {{ $ad->roommate->roommate_age }}</h3>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $ad->roommate->city.'-'.$ad->roommate->ward.',
          '.$ad->roommate->area.', '.$ad->roommate->tole }}</p>
        <p>Nrs. {{ $ad->roommate->roommate_rent_price }}/month</p>
        <p>{{ $ad->roommate->roommate_description }}</p>
        @foreach ($ad->roommate->features as $feature)
        <p>{{ $feature->feature }}</p>
        @endforeach
        <p>{{ strtoupper($ad->roommate->gender) }}</p>
        <p>{{ $ad->roommate->contact_number }}</p>
      </div>
      @else
      @php
      $images = explode('|',$ad->room->image[0]->image_url);
      @endphp
      @foreach ($images as $item )
      @php
      $img = $images[0];
      @endphp
      @endforeach
      <div class="ad-image">
        <img src="{{ URL::to($img) }}" class="img-fluid" alt="room-image">
      </div>
      <div class="ad-about">
        <h3>{{ $ad->room->room_title }}</h3>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $ad->room->city.'-'.$ad->room->ward.', '.$ad->room->area.', '.$ad->room->tole }}</p>
        <p>{{ $ad->room->room_description }}</p>
        <p>Nrs.{{ $ad->room->room_price }}/month</p>
        <p>{{ $ad->room->contact_number }}</p>
      </div>
      @endif
    </div>
    @endforeach
  </div>
</div>
@include('layouts.footer')