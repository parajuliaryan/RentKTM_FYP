<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\RoomImages;
use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Rooms::all();
        return view('rooms', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create-room-ads');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_description' => 'required',
            'room_price' => 'required',
            'room_type' => 'required',
            'contact_number' => 'required',
            'city' => 'required',
            'ward' => 'required',
            'area' => 'required',
            'tole' => 'required',
        ]);

        $user_id = auth()->user()->id;
        Rooms::create($request->all());
        $room = Rooms::latest()->first();
        $room_id = $room->id;

        $images = array();
        if ($room_images = $request->file('room_images')) {
            foreach ($room_images as $room_image) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($room_image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/room_images/';
                $image_url = $upload_path . $image_full_name;
                $room_image->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
        }

        RoomImages::create([
            'room_id' => $room_id,
            'image_url' => implode('|', $images)
        ]);

        Ads::create([
            'ad_type' => 'room',
            'user_id' => $user_id,
            'room_id' => $room_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('Success', 'Room added Successfully.');
    }

    public function edit()
    {
        return view('rooms.edit-room-ads');
    }

    public function update(Request $request, Rooms $room)
    {
        $request->validate([
            'room_description' => 'required',
            'room_price' => 'required',
            'room_type' => 'required',
            'contact_number' => 'required',
            'city' => 'required',
            'ward' => 'required',
            'area' => 'required',
            'tole' => 'required',
        ]);

        $room->update($request->all());
        $images = array();
        if ($room_images = $request->file('room_images')) {
            foreach ($room_images as $room_image) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($room_image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/room_images/';
                $image_url = $upload_path . $image_full_name;
                $room_image->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
        }

        return redirect()->back()->with('Success', 'Room Updated Successfully.');
    }

    public function destroy(Rooms $room)
    {
        $room->delete();
        return redirect()->back()->with('Success', 'Room Deleted Successfully.');
    }
}
