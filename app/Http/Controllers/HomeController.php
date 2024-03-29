<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Roommates;
use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Rooms::orderBy('counter_field','desc')->take(8)->get();
        return view('home', compact('rooms'));
    }

    public function search(Request $request){
        $roomTypes = RoomType::all();
        if ($request['search-value'] == 'roommates') {
            $max = Roommates::max('roommate_rent_price');
            $search = $request['search'] ?? "";
            if ($search != "") {
                $ads = Ads::whereHas('roommate', function($q) use ($search)
                {
                    $q->where('area','LIKE',"%$search%");
                })->get();
            }else{
                $ads = Ads::all()->where('ad_type','=', 'roommate');
            }
            return view('roommates', compact('ads', 'search', 'max')); 

        }elseif ($request['search-value'] == 'rooms') {
            $max = Rooms::max('room_price');
            $search = $request['search'] ?? "";
            if ($search != "") {
                $ads = Ads::whereHas('room', function($q) use ($search)
                {
                    $q->where('area','LIKE',"%$search%");
                })->get();

            }else{
                $ads = Ads::all()->where('ad_type','=', 'room');
            }
            return view('rooms', compact('ads', 'roomTypes', 'search', 'max')); 
        }else{
            return redirect()->back()->with('message', 'Please select room or roommate option');
        }
 
    }

}
