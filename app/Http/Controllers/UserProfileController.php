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
        $ads = Ads::select('*')->where('user_id', $user_id)->get();
        return view('user.profile', compact('user', 'ads'));
    }

    public function edit(Request $request){
        $user_id = $request->id;
        $user = User::where('id',$user_id)->first();
        return view('user.edit', $user);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
    }
}
