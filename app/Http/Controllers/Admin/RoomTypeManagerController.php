<?php

namespace App\Http\Controllers\Admin;

use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypeManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomType = RoomType::all();
        return view('room-type-manager.index',compact('roomType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room-type-manager.create');
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
            'type'      =>  'required|unique:room_type',
        ]);

        RoomType::create([
            'type'      =>  $request->input('type')
        ]);

        return redirect()->route('room-type-manager.index')->with('success','You have successfully add Room Type.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        return view('room-type-manager.show', compact('roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        return view('room-type-manager.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'type'      =>  'required|unique:room_type',
        ]);

        $roomType->update([
            'type'      =>  $request->input('type')
        ]);

        return redirect()->route('room-type-manager.index')->with('success','You have successfully update Room Type.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        $roomType->delete();
        return redirect()->back()->with('success', 'Room Type has been deleted Successfully');
    }
}
