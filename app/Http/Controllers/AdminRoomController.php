<?php

namespace App\Http\Controllers;

use App\Models\RoomImages;
use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Rooms::all();
        return view('admin.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomTypes = RoomType::all();
        return view('admin.rooms.create', compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    
        Rooms::create($request->all());
        $room = Rooms::latest()->first();
        $room_id = $room->id;

        $images = array();
        if ($room_images = $request->file('room_images')) {
            foreach ($room_images as $room_image) {
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($room_image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/room_images/';
                $image_url = $upload_path.$image_full_name;
                $room_image->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
        }

        RoomImages::create([
            'room_id'=>$room_id,
            'image_url'=> implode('|', $images)
        ]);

        return redirect()->route('admin.rooms.index')->with('Success','Room added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show(Rooms $room)
    {
        $images = RoomImages::where('room_id',$room->id)->first();
        return view('admin.rooms.show', compact('room','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit(Rooms $room)
    {
        return view('admin.rooms.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('admin.rooms.index')->with('Success','Room Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rooms $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('Success','Room Deleted Successfully.');
    }
}
