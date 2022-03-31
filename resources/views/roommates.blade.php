@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/roommates.css') }}">
<div class="page-wrapper">
    <div class="main-container">
        <div class="filterbar">
            <div class="filter-title">
                <h3>Filter Options</h3>
            </div>
            <div class="filter-option">
                <p>Price Options</p>
                <div class="form-group">
                    <input type="radio" name="price-filter" id="high-low">
                    <label for="high-low">Price High to Low</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="price-filter" id="low-high">
                    <label for="high-low">Price Low to High</label>
                </div>
            </div>
            <div class="filter-option">
                <p>Room Type</p>
                <div class="form-group">
                    <input type="checkbox" name="room_type" id="room_type">
                    <label for="room_type">1BHK</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="room_type" id="room_type">
                    <label for="room_type">2BHK</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="room_type" id="room_type">
                    <label for="room_type">3BHK</label>
                </div>
            </div>
        </div>

        <div class="roommates-container">
            <div class="roommate-title">
                <h3>Roommates List</h3>
                <div class="sort-btns">
                    <div class="form-group">
                        <label for="sort">Sort By:</label>
                        <select name="sort" id="sort">
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="roommates-holder">
                @foreach ($ads as $ad )
                @if ($ad->status == 'approved')
                    <div class="roommate">
                        <div class="roommate-image">
                            <img src="{{ asset($ad->roommate->roommate_image) }}" alt="roommate-image">
                        </div>
                        <div class="roommate-texts">
                            <div class="roommate-name">
                                <h4>{{ $ad->roommate->roommate_name }}</h4>
                                <a href="{{ route('post-ads.roommates.show', $ad->roommate->id) }}">View Roommate</a>
                            </div>
                            <div class="roommate-description">
                                <p>{{ $ad->roommate->roommate_description }}</p>
                            </div>
                            <div class="roommate-rent-price">
                                <p>Price: Nrs.{{ $ad->roommate->roommate_rent_price }}/month</p>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')