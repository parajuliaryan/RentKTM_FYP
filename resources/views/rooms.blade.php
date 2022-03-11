@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/rooms.css') }}">
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
        <div class="rooms-container">
            <div class="room-title">
                <h3>Rooms List</h3>
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
            <div class="rooms-holder">
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
                <div class="room">
                    <div class="room-image">
                        <img src="{{ asset('images/room4.jpg') }}" alt="room-image">
                    </div>
                    <div class="room-text">
                        <h3>Room Title</h3>
                        <p>room description</h3>
                        <p class="d-flex justify-content-between"><span><i class="fa fa-map-marker"
                                aria-hidden="true"></i> Location</span><span>Nrs.12000/month</span></p>
                    </div>
                    <div class="room-btns">
                        <button><a href="#">View Room</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')