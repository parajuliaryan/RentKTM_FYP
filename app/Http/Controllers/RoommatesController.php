<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\RoommateFeatures;
use App\Models\Roommates;
use Illuminate\Http\Request;

class RoommatesController extends Controller
{
    public function index(){
        $ads = Ads::all()->where('ad_type','=','roommate');
        return view('roommates', compact('ads'));
    }

    public function create(){
        return view('roommates.create-roommate-ads');
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
            'roommate_name' => 'required',
            'roommate_age' => 'required',
            'roommate_rent_price' => 'required',
            'roommate_description' => 'required',
            'contact_number' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'ward' => 'required',
            'area' => 'required',
            'tole' => 'required',
            'roommate_image'=> 'required',
        ]);
        
        $user_id = auth()->user()->id;
        $imageName = time().'.'.$request->roommate_image->extension();  
        $request->roommate_image->move(public_path('images'), $imageName);
        Roommates::create([
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
            'roommate_image'=> $imageName,
        ]);

        $newRoommate = Roommates::latest()->first();
        $features = $request->roommate_feature;
        foreach ($features as $feature) {
            RoommateFeatures::create([
                'roommate_id' => $newRoommate->id,
                'feature' => $feature,
            ]);
        }
        Ads::create([
            'ad_type'=> 'roommate',
            'user_id' => $user_id,
            'roommate_id' => $newRoommate->id,
            'status' => 'pending',
        ]);
        return redirect()->back()->with('message','Roommate added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roommates  $roommates
     * @return \Illuminate\Http\Response
     */
    public function show(Roommates $roommate)
    {
        $features = RoommateFeatures::all()->where('roommate_id','=', $roommate->id);
        $ads = Ads::where('roommate_id', $roommate->id)->first();
        return view('roommates.show-roommate', compact('roommate', 'ads', 'features'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roommates  $roommates
     * @return \Illuminate\Http\Response
     */
    public function edit(Roommates $roommate)
    {
        return view('admin.roommates.edit', compact('roommate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roommates  $roommates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roommates $roommate)
    {
        $request->validate([
            'roommate_name' => 'required',
            'roommate_age' => 'required',
            'roommate_rent_price' => 'required',
            'roommate_description' => 'required',
            'contact_number' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'ward' => 'required',
            'area' => 'required',
            'tole' => 'required',
        ]);

        $imageName = time().'.'.$request->roommate_image->extension();  
        $request->roommate_image->move(public_path('images'), $imageName);
    
        $roommate->update([
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
            'roommate_image'=> $imageName,
        ]);
        
        $features = RoommateFeatures::where('roommate_id','=', $roommate->id)->get();
        

        return redirect()->route('user.index')->with('message','Roommate Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roommates  $roommates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roommates $roommate)
    {
        $roommate->delete();
        return redirect()->route('user.index')->with('message','Roommate Deleted Successfully.');
    }
}
