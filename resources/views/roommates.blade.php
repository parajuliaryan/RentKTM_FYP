@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/roommates.css') }}">
<div class="page-wrapper">
    <div class="main-container">
        <div class="filterbar">
            <div class="filter-title">
                <h3>Filter Options</h3>
            </div>
            <form action="{{ route('roommates.filter') }}" method="GET">
                @csrf
                <div class="filter-option">
                    <p>Price Filter</p>
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" name="min_price">
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
                        <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                    </div>
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

        <div class="roommates-container">
            <div class="roommate-title">
                <h3>Roommates List</h3>
            </div>
            <div class="roommates-holder">
                @php
                $elseCount = 0;
                @endphp
                @foreach ($ads as $ad )
                @if ($ad->status == 'approved')
                @if (isset($search))
                @if ($ad->roommate != null)
                <div class="roommate">
                    <div class="roommate-image">
                        {{$ad->roommate->roommate_image}}
                        <img src="{{ asset('images/'.$ad->roommate->roommate_image) }}" alt="roommate-image">
                    </div>
                    <div class="roommate-texts">
                        <div class="roommate-name">
                            <h4>{{ $ad->roommate->roommate_name }}</h4>
                        </div>
                        <div class="roommate-description">
                            <p>{{ Str::limit($ad->roommate->roommate_description, 100) }}</p>
                        </div>
                        <div class="roommate-area">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $ad->roommate->area}}</p></span>
                        </div>
                        <div class="roommate-rent-price">
                            <p>Rent Price: Nrs.{{ $ad->roommate->roommate_rent_price }}/month</p>
                        </div>
                        <a href="{{ route('post-ads.roommates.show', $ad->roommate->id) }}" class="roommate-view">View
                            Roommate</a>
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
                        <a href="{{ route('post-ads.roommates.show', $ad->roommate->id) }}" class="roommate-view">View
                            Roommate</a>
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
<script>
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