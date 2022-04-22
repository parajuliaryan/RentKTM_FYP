<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\RoommateFeatures;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::select('*')->where('id', $user_id)->first();
        $ads = Ads::select('*')->where('user_id', $user_id)->get();
        return view('user.profile', compact('user', 'ads'));
    }

    public function edit(Request $request)
    {
        $user_id = $request->id;
        $user = User::where('id', $user_id)->first();
        return view('user.edit', $user);
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('message', 'Profile updated');
    }

    public function editAds(Request $request)
    {
        $ad = Ads::where('id', $request->id)->first();
        $roomTypes = RoomType::all();
        return view('user.edit-ads', compact('ad', 'roomTypes'));
    }

    public function updateAds(Request $request)
    {
        $id = $request->id;
        $adRoom = Ads::where('id', $id)->whereHas('room')->first();
        $adRoommate = Ads::where('id', $id)->whereHas('roommate')->first();
        if ($adRoom) {
            $request->validate([
                'room_title' => 'required',
                'room_description' => 'required',
                'room_price' => 'required',
                'room_type' => 'required',
                'contact_number' => 'required',
                'city' => 'required',
                'ward' => 'required',
                'area' => 'required',
                'tole' => 'required',
            ]);
            $adRoom->room->update($request->all());
        }

        elseif ($adRoommate) {
            $request->validate([
                'roommate_name' => 'required',
                'roommate_age' => 'required',
                'roommate_rent_price' => 'required',
                'roommate_description' => 'required',
                'gender' => 'required',
                'contact_number' => 'required',
                'city' => 'required',
                'ward' => 'required',
                'area' => 'required',
                'tole' => 'required',
            ]);
      
            $adRoommate->roommate->update([
                'roommate_name' => $request->roommate_name,
                'roommate_age' => $request->roommate_age,
                'roommate_rent_price' => $request->roommate_rent_price,
                'roommate_description' => $request->roommate_description,
                'gender' => $request->gender,
                'contact_number' => $request->contact_number,
                'city' => $request->city,
                'ward' => $request->ward,
                'area' => $request->area,
                'tole' => $request->tole,
            ]);

            $features =  RoommateFeatures::where('roommate_id', $adRoommate->roommate->id)->get();

            if(count($request->roommate_feature) > 0){
            
                for($i = 0; $i < count($request->roommate_feature); $i++){
                    
                    $features[$i]->roommate_id = $adRoommate->roommate->id;
                    $features[$i]->feature = $request->roommate_feature[$i];
                    $features[$i]->update();
            
                } 
            }
        }

        return redirect()->route('user.index')->with('message', 'Ad Updated Successfully.');
    }

    public function destroyAds(Request $request){
        $id = $request->id;
        $adRoom = Ads::where('id', $id)->whereHas('room')->first();
        $adRoommate = Ads::where('id', $id)->whereHas('roommate')->first();
        if ($adRoom) {
            $adRoom->room->delete();
        }elseif ($adRoommate) {
            $adRoommate->roommate->delete();
        }       
        return redirect()->route('user.index')->with('message','Ad Deleted Successfully.');
    }
}
