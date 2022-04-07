@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/rooms.css') }}">
<div class="page-wrapper">
    <div class="main-container">
        <div class="filterbar">
            <div class="filter-title">
                <h3>Filter Options</h3>
            </div>
            <form action="{{ route('rooms.filter') }}" method="GET">
                @csrf
                <div class="filter-option">
                    <p>Price Options</p>
                    <div class="form-group">
                        <input type="radio" name="price_filter" id="high-low" value="high">
                        <label for="high-low">Price High to Low</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="price_filter" id="low-high" value="low">
                        <label for="high-low">Price Low to High</label>
                    </div>
                </div>
                <div class="filter-option">
                    <p>Room Type</p>
                    @foreach ($roomTypes as $roomType)
                    <div class="form-group">
                        <input type="checkbox" name="room_type[]" id="room_type" value="{{ $roomType->room_type }}">
                        <label for="room_type">{{ $roomType->room_type }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="sort-btns">
                    <div class="form-group d-flex flex-column mb-3">
                        <label for="sort">Sort By:</label>
                        <select name="sort" id="sort" class="sort-select w-75">
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                        </select>
                    </div>
                </div>
                <div class="filter-button mb-3">
                    <button type="submit">Apply Filters</button>
                </div>
            </form>
        </div>
        <div class="rooms-container">
            <div class="room-title">
                <h3>Rooms List</h3>
            </div>
            <div class="rooms-holder">
                @php
                $elseCount = 0;
                @endphp
                @foreach ($ads as $ad )
                @if ($ad->status == 'approved')
                @if (isset($search))
                @php
                $images = explode('|',$ad->room->image[0]->image_url);
                @endphp
                @if ($ad->room != null)
                <div class="room">
                    <div class="room-image">
                        @foreach ($images as $item )
                        @php
                        $img = $images[0];
                        @endphp
                        @endforeach
                        <img src="{{ URL::to($img) }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h4>{{ $ad->room->room_title }}</h4>
                        <p class="rate-text">{{ Str::limit($ad->room->room_description , 20) }}</p>
                        <p class="d-flex justify-content-between"><span class="rate-text"><i class="fa fa-map-marker"
                                    aria-hidden="true"></i> {{ $ad->room->area }}</span><span class="rate-text">Nrs.{{
                                $ad->room->room_price }}/month</span></p>
                    </div>
                    <div class="room-btns">
                        <a href="{{ route('post-ads.rooms.show', $ad->room->id) }}">View Room</a>
                    </div>
                </div>
                @else
                @php
                $elseCount = $elseCount + 1;
                @endphp
                @endif
                @else
                @php
                $images = explode('|',$ad->room->image[0]->image_url);
                @endphp
                <div class="room">
                    <div class="room-image">
                        @foreach ($images as $item )
                        @php
                        $img = $images[0];
                        @endphp
                        @endforeach
                        <img src="{{ URL::to($img) }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h4>{{ $ad->room->room_title }}</h4>
                        <p class="rate-text">{{ Str::limit($ad->room->room_description , 100) }}</p>
                        <p class="d-flex justify-content-between"><span class="rate-text"><i class="fa fa-map-marker"
                                    aria-hidden="true"></i> {{ $ad->room->area }}</span><span class="rate-text">Nrs.{{
                                $ad->room->room_price }}/month</span></p>
                    </div>
                    <div class="room-btns">
                        <a href="{{ route('post-ads.rooms.show', $ad->room->id) }}">View Room</a>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (isset($elseCount) && $elseCount > 0)
                <h2 class="text-danger">No results found.</h2>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
</script>
@include('layouts.footer')