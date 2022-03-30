<?php

namespace App\Http\Controllers;

use App\Models\Roommates;
use App\Models\Rooms;
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
        if ($request['search-value'] == 'roommates') {
            $search = $request['search'] ?? "";
            if ($search != "") {
                $roommates = Roommates::where('area','LIKE', "%$search%")->get();
            }else{
                $roommates = Roommates::all();
            }
            return view('roommates', compact('roommates')); 

        }elseif ($request['search-value'] == 'rooms') {
            $search = $request['search'] ?? "";
            if ($search != "") {
                $rooms = Rooms::where('area','LIKE', "%$search%")->get();
            }else{
                $rooms = Rooms::all();
            }
            return view('rooms', compact('rooms')); 
        }
 
    }

}
