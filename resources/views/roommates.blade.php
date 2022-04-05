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
                @php
                    $elseCount = 0;
                 @endphp
                @foreach ($ads as $ad )
                    @if ($ad->status == 'approved')
                        @if (isset($search))
                            @php
                                $roommate=$ad->roommate->where('area','LIKE', "%$search%")->first();
                            @endphp
                            @if ($roommate != null)
                                <div class="roommate">
                                    <div class="roommate-image">
                                        {{$roommate->roommate_image}}
                                        <img src="{{ asset('images/'.$roommate->roommate_image) }}" alt="roommate-image">
                                    </div>
                                    <div class="roommate-texts">
                                        <div class="roommate-name">
                                            <h4>{{ $roommate->roommate_name }}</h4>
                                        </div>
                                        <div class="roommate-description">
                                            <p>{{ Str::limit($roommate->roommate_description, 100) }}</p>
                                        </div>
                                        <div class="roommate-area">
                                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $ad->roommate->area}}</p></span>
                                        </div>
                                        <div class="roommate-rent-price">
                                            <p>Rent Price: Nrs.{{ $roommate->roommate_rent_price }}/month</p>
                                        </div>
                                        <a href="{{ route('post-ads.roommates.show', $roommate->id) }}" class="roommate-view">View Roommate</a>
                                    </div>
                                </div>
                            @else
                                @php
                                    $elseCount +=1;
                                @endphp
                            @endif
                        @else
                            <div class="roommate">
                                <div class="roommate-image">
                                    <img src="{{ asset('images/'.$ad->roommate->roommate_image) }}" alt="roommate-image">
                                </div>
                                <div class="roommate-texts">
                                    <div class="roommate-name">
                                        <h4>{{ $ad->roommate->roommate_name }}</h4>
                                    </div>
                                    <div class="roommate-description">
                                        <p>{{ Str::limit($ad->roommate->roommate_description, 100) }}</p>
                                    </div>
                                    <div class="roommate-rent-price">
                                        <p> Rent Price: Nrs.{{ $ad->roommate->roommate_rent_price }}/month</p>
                                    </div>
                                    <div class="roommate-area">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $ad->roommate->area}}</p></span>
                                    </div>
                                    <a href="{{ route('post-ads.roommates.show', $ad->roommate->id) }}" class="roommate-view">View Roommate</a>
                                </div>
                            </div>    
                        @endif
                    @endif
                @endforeach
                    @if ($elseCount>0)
                        <h2 class="text-danger">No results found.</h2>
                    @endif 
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')