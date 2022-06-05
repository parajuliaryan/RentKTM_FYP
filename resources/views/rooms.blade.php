@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/rooms.css') }}">
<div class="page-wrapper">
    <div class="main-container">
        <div class="filterbar">
            <div class="filter-title">
                <h3>Filter Options</h3>
            </div>
            <form action="{{ route('rooms.filter') }}" method="POST">
                @csrf
                <div class="filter-option">
                    <p>Price Filter</p>
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" name="min_price" id="input_min">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" class="input-max" name="max_price">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="1000" max="{{ $max }}" value="2500" step="1000">
                        <input type="range" class="range-max" min="1000" max="{{ $max }}" value="10000" step="1000">
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
                    <button type="submit" id="filter_btn">Apply Filters</button>
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
    $('#filter_btn').click(function (e) {
            var inputMin = $("#input_min").val();
            if (inputMin == "0") {
                e.preventDefault();    
                alert("0 cannot be entered, begin minimum price from 1");
                return;
            }
        });


    const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
    let priceGap = 1000;
    priceInput.forEach(input =>{
        input.addEventListener("input", e =>{
            let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);
            
            if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
                if(e.target.className === "input-min"){
                    rangeInput[0].value = minPrice;
                    range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                }else{
                    rangeInput[1].value = maxPrice;
                    range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                }
            }
        });
    });

    rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);
        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
    });
</script>
@include('layouts.footer')