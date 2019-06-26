<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotel-manager.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('hotel-manager.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotel-manager.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name'  =>  'required',
            'address'   =>  'required',
            'city'      =>  'required',
            'state'     =>  'required',
            'country'   =>  'required',
            'zipcode'   =>  'required',
            'phone_number'  =>  'required',
            'email'     =>  'required'
        ]);

        $imageName = null;

        if($request->has('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/hotel'), $imageName);
        }   

        $data = $request->input();
        $hotel->update([
            'name'  =>      $data['name'],
            'address'   =>  $data['address'],
            'city'      =>  $data['city'],
            'state'     =>  $data['state'],
            'country'   =>  $data['country'],
            'zipcode'   =>  $data['zipcode'],
            'phone_number'  =>  $data['phone_number'],
            'email'     =>  $data['email'],
            'image'     =>  $imageName !== null ? $imageName : $hotel->image
        ]);
        return redirect()->route('hotel-manager.index')->with('success','You have successfully update hotel.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->back()->with('success', 'Hotel has been deleted Successfully');        
    }
}
