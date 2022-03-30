<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;

class AdminAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        return view('admin.ads.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ad)
    {
        return view('admin.ads.edit', $ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ad)
    {
        $ad->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.ads.index')->with('Success','Roommate Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        //
    }

    public function adRequests(){
        $ads = Ads::where('status','=','pending')->get();
        return view('admin.ad-requests.index', compact('ads'));
    }

    public function editAdRequests(Request $request){
        $ad = Ads::where('id','=', $request->id)->first();
        return view('admin.ad-requests.edit', $ad);
    }

    public function updateAdRequests(Request $request){
        $ad = Ads::where('id','=', $request->id)->first();
        $ad->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.ad-requests')->with('Success','Roommate Updated Successfully.');
    }
}
