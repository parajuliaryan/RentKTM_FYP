@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/show-room.css') }}">
@php
$image = explode('|',$images->image_url);
$count = 0;
$index = 0;
@endphp
<div class="main-container">
  <div class="wrapper mt-3 mb-3">
    <div class="mt-3 carousel-wrapper">
      <div class="room-heading">
        <h2>{{ $room->room_title }}</h2>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $room->city.'-'.$room->ward.', '.$room->area.',
          '.$room->tole }}</p></span>
      </div>
      <div class="carousel-container position-relative row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @foreach ($image as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : ''  }}" data-slide-number="{{ $count }}">
              <img src="{{ URL::to($item) }}" class="d-block w-100" alt="..." data-remote="{{ URL::to($item) }}"
                data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
            </div>
            @php
            $count +=1;
            @endphp
            @endforeach
          </div>
        </div>
        <!-- Carousel Navigation -->
        <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row mx-0">
                @foreach ($image as $item)
                <div id="carousel-selector-{{ $index }}" class="thumb col-4 col-sm-2 px-1 py-2 selected"
                  data-target="#myCarousel" data-slide-to="{{ $index }}">
                  <img src="{{ URL::to($item) }}" class="img-fluid" alt="...">
                </div>
                @php
                $index +=1;
                @endphp
                @endforeach
                <div class="col-2 px-1 py-2"></div>
                <div class="col-2 px-1 py-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="about-room">
        <h3>About the room</h3>
        <p>{{ $room->room_description }}</p>
      </div>
      <div class="ratings-reviews-list">
        @foreach ($reviews as $review)
        <div class="single-review">
          <div class="user-info">
            <p>Review By: {{ $review->user->first_name.' '. $review->user->last_name}}</p>
          </div>
          <div class="rating">
            @php $rating = $review->room_rating; @endphp
            <p>
            <div>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <span class="small">({{ $rating }})</span>
            </div>
            <div class="overlay" style="position: relative;top: -22px;">
              @while($rating>0)
              @if($rating >0.5)
              <i class="fas fa-star"></i>
              @else
              <i class="fas fa-star-half"></i>
              @endif
              @php $rating--; @endphp
              @endwhile
            </div>
            </p>
          </div>
          <div class="review">
            <p>{{ $review->room_review }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <div class="write-review">
        <a href="#" data-toggle="modal" data-target="#exampleModal">Leave a Review</a>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Room Review</h5>
              <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('reviews.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                <div class="rate">
                  <input type="hidden" name="room_id" value="{{ $room->id }}">
                  <input type="radio" id="star5" class="rate" name="rating" value="5" />
                  <label for="star5" title="text">5 stars</label>
                  <input type="radio" checked id="star4" class="rate" name="rating" value="4" />
                  <label for="star4" title="text">4 stars</label>
                  <input type="radio" id="star3" class="rate" name="rating" value="3" />
                  <label for="star3" title="text">3 stars</label>
                  <input type="radio" id="star2" class="rate" name="rating" value="2">
                  <label for="star2" title="text">2 stars</label>
                  <input type="radio" id="star1" class="rate" name="rating" value="1" />
                  <label for="star1" title="text">1 star</label>
                </div>
                <textarea name="room_review" id="room_review" cols="50" rows="10" placeholder="Write Review"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <div class="text-contents">
      <div class="ad-posted">
        <h4>Ad posted by</h4>
        <p>{{ $ads->user->first_name . ' ' . $ads->user->last_name }}</p>
      </div>
      <div class="room-price">
        <h4>Price</h4>
        <p>Nrs.{{ $room->room_price }}/month </p>
      </div>
      @if ($room->student_price != null)
      <div class="student-price">
        <h4>Price for students</h4>
        <p>Nrs.{{ $room->student_price }}/month</p>
      </div>
      @endif
      <div class="contact-number">
        <h4>For Enquiry</h4>
        <p> {{ $room->contact_number }}</p>
      </div>
      <div class="room-type">
        <h4>Room Type</h4>
        <p>{{ $room->room_type }}</p>
      </div>
      <div class="send-message">
        <i class="fa fa-message"></i> <a href="{{ route('chatify') }}">Send Message</a>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')
<script type="text/javascript">
  $('#myCarousel').carousel({
          interval: false
        });

        $('#carousel-thumbs').carousel({
          interval: false
        });

        // handles the carousel thumbnails
        // https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel

        $('[id^=carousel-selector-]').click(function() {
          var id_selector = $(this).attr('id');
          var id = parseInt( id_selector.substr(id_selector.lastIndexOf('-') + 1) );
          $('#myCarousel').carousel(id);
        });
        
        // Only display 3 items in nav on mobile.
        if ($(window).width() < 575) {
          $('#carousel-thumbs .row div:nth-child(4)').each(function() {
            var rowBoundary = $(this);
            $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll().addBack());
          });
          $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function() {
            var boundary = $(this);
            $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll().addBack());
          });
        }


        // Hide slide arrows if too few items.
        if ($('#carousel-thumbs .carousel-item').length < 2) {
          $('#carousel-thumbs [class^=carousel-control-]').remove();
          $('.machine-carousel-container #carousel-thumbs').css('padding','0 5px');
        }


        // when the carousel slides, auto update
        $('#myCarousel').on('slide.bs.carousel', function(e) {
          var id = parseInt( $(e.relatedTarget).attr('data-slide-number') );
          $('[id^=carousel-selector-]').removeClass('selected');
          $('[id=carousel-selector-'+id+']').addClass('selected');
        });


        // when user swipes, go next or previous
        $('#myCarousel').swipe({
          fallbackToMouseEvents: true,
          swipeLeft: function(e) {
            $('#myCarousel').carousel('next');
          },
          swipeRight: function(e) {
            $('#myCarousel').carousel('prev');
          },
          allowPageScroll: 'vertical',
          preventDefaultEvents: false,
          threshold: 75
        });

        $('#myCarousel .carousel-item img').on('click', function(e) {
          var src = $(e.target).attr('data-remote');
          if (src) $(this).ekkoLightbox();
        });
</script>