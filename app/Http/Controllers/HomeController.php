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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request){
        $roomTypes = RoomType::all();
        if ($request['search-value'] == 'roommates') {
            $search = $request['search'] ?? "";
            if ($search != "") {
                $ads = Ads::all()->where('ad_type','=', 'roommate');
                $roommates = Roommates::where('area','LIKE', "%$search%")->get();
            }else{
                $ads = Ads::all()->where('ad_type','=', 'roommate');
            }
            return view('roommates', compact('ads, search')); 

        }elseif ($request['search-value'] == 'rooms') {
            $search = $request['search'] ?? "";
            if ($search != "") {
                $ads = Ads::all()->where('ad_type','=', 'room');
                $rooms = Rooms::where('area','LIKE', "%$search%")->get();
            }else{
                $ads = Ads::all()->where('ad_type','=', 'room');
            }
            return view('rooms', compact('ads', 'roomTypes', 'search')); 
        }
 
    }

}
