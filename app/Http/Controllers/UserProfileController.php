<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $user = User::select('*')->where('id', $user_id)->first();
        $ads = Ads::select('*')->where('user_id', $user_id)->first();
        return view('user.profile', compact('user', 'ads'));
    }

    public function edit(){
        return view('user.edit');
    }
}
