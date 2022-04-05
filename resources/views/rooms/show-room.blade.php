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
      <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $room->city.'-'.$room->ward.', '.$room->area.', '.$room->tole }}</p></span>
    </div>
    <div class="carousel-container position-relative row">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($image as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : ''  }}" data-slide-number="{{ $count }}">
              <img src="{{ URL::to($item) }}" class="d-block w-100" alt="..." data-remote="{{ URL::to($item) }}" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
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
                  <div id="carousel-selector-{{ $index }}" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="{{ $index }}">
                    <img src="{{ URL::to($item) }}" class="img-fluid" alt="..." >
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