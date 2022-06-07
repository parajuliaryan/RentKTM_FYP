@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/profile.css') }}">
<div class="main-container">
  @if(session()->has('message'))
  <div class="alert alert-success fade show" role="alert">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(count($errors) > 0)
  <div class="p-1">
    @foreach($errors->all() as $error)
    <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button type="button" class="close"
        data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>
    @endforeach
  </div>
  @endif
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
        <div class="title-holder">
          <h3>{{ $ad->roommate->roommate_name }}, {{ $ad->roommate->roommate_age }}</h3>
          <div class="btns">
            <a href="{{ route('user.ads.edit', $ad->id) }}"><i class="fa fa-edit"></i></a>
            <form action="{{ route('user.ads.destroy', $ad->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-danger" style="background: none; border:none;"><i
                  class="fa fa-trash"></i></button>
            </form>
          </div>
        </div>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $ad->roommate->city.'-'.$ad->roommate->ward.',
          '.$ad->roommate->area.', '.$ad->roommate->tole }}</p>
        <p>Nrs. {{ $ad->roommate->roommate_rent_price }}/month</p>
        <p>{{ $ad->roommate->roommate_description }}</p>
        @foreach ($ad->roommate->features as $feature)
        <p>{{ $feature->feature }}</p>
        @endforeach
        <p>{{ strtoupper($ad->roommate->gender) }}</p>
        <p>{{ $ad->roommate->contact_number }}</p>
        <p class="text-danger">Status: {{ strtoupper( $ad->status) }}</p>
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
        <div class="title-holder">
          <h3>{{ $ad->room->room_title }}</h3>
          <div class="btns">
            <a href="{{ route('user.ads.edit', $ad->id) }}"><i class="fa fa-edit"></i></a>
            <form action="{{ route('user.ads.destroy', $ad->id) }}" method="POST" id="delete_form">
              @csrf
              @method('DELETE')
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                      <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete the selected ad?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="text-danger" style="background: none; border:none;"  data-toggle="modal" data-target="#exampleModal"><i
                  class="fa fa-trash"></i></button>
            </form>
          </div>
        </div>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $ad->room->city.'-'.$ad->room->ward.',
          '.$ad->room->area.', '.$ad->room->tole }}</p>
        <p>{{ $ad->room->room_description }}</p>
        <p>Rent: Nrs.{{ $ad->room->room_price }}/month</p>
        @if ($ad->room->student_price != null)
        <p>Student: Nrs.{{ $ad->room->student_price }}/month</p>
        @endif
        <p>{{ $ad->room->contact_number }}</p>
        <p class="text-danger">Status: {{ strtoupper( $ad->status) }}</p>
      </div>
      @endif
    </div>
    @endforeach
  </div>
</div>
@include('layouts.footer')
<script>
  $(document).ready(function () {

 });
</script>