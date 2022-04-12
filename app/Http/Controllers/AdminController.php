<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Roommates;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $rooms = Rooms::all();
        $roommates = Roommates::all();
        $users = User::all();
        $ads = Ads::all()->where('status','pending');
        return view('admin.dashboard', compact('rooms','roommates','users','ads'));
    }
}
