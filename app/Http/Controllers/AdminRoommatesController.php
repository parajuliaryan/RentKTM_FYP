<?php

namespace App\Http\Controllers;

use App\Models\Roommates;
use Illuminate\Http\Request;

class AdminRoommatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roommates = Roommates::all();
        return view('admin.roommates.index',compact('roommates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roommates.create');
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
            'roommate_features' => 'required',
            'contact_number' => 'required',
            'city' => 'required',
            'ward' => 'required',
            'area' => 'required',
            'tole' => 'required',
            'roommate_image'=> 'required',
        ]);

        $imageName = time().'.'.$request->roommate_image->extension();  
        $request->roommate_image->move(public_path('images'), $imageName);
        Roommates::create([
            'roommate_name' => $request->roommate_name,
            'roommate_age' => $request->roommate_age,
            'roommate_rent_price' => $request->roommate_rent_price,
            'roommate_description' => $request->roommate_description,
            'roommate_features' => $request->roommate_features,
            'contact_number' => $request->contact_number,
            'city' => $request->city,
            'ward' => $request->ward,
            'area' => $request->area,
            'tole' => $request->tole,
            'roommate_image'=> $imageName,
        ]);

        return redirect()->route('admin.roommates.index')->with('Success','Roommate added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roommates  $roommates
     * @return \Illuminate\Http\Response
     */
    public function show(Roommates $roommate)
    {
        return view('admin.roommates.show', $roommate);
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
            'roommate_features' => 'required',
            'contact_number' => 'required',
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
            'roommate_features' => $request->roommate_features,
            'contact_number' => $request->contact_number,
            'city' => $request->city,
            'ward' => $request->ward,
            'area' => $request->area,
            'tole' => $request->tole,
            'roommate_image'=> $imageName,
        ]);

        return redirect()->route('admin.roommates.index')->with('Success','Roommate Updated Successfully.');
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
        return redirect()->route('admin.roommates.index')->with('Success','Roommate Deleted Successfully.');
    }
}
