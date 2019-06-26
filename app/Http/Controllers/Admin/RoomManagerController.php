<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\RoomType;
use App\RoomCapacity;

class RoomManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with(['hotel', 'type.cost', 'capacity', 'booking'])->get();
        return view('room-manager.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::all();
        $roomTypes = RoomType::all();
        $capacity = RoomCapacity::all();

        return view('room-manager.create', compact(['hotels', 'roomTypes', 'capacity']));
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
            'hotel_id'  =>  'required',
            'name'      =>  'required',
            'room_type_id' => 'required',
            'room_capacity_id' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg'
        ]);
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/hotel'), $imageName);

        $data = $request->input();

        Room::create([
            'hotel_id'          =>  $data['hotel_id'],
            'name'              =>  $data['name'],
            'room_type_id'      => $data['room_type_id'],
            'room_capacity_id'  => $data['room_capacity_id'],
            'image'             => $imageName
        ]);

        return redirect()->route('room-manager.index')->with('success','You have successfully add room.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('room-manager.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        $types = RoomType::all();
        $capacity = RoomCapacity::all();

        return view('room-manager.edit', compact(['room', 'hotels', 'types', 'capacity']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'hotel_id'  =>  'required',
            'name'      =>  'required',
            'room_type_id' => 'required',
            'room_capacity_id' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg'
        ]);
        

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/hotel'), $imageName);        
        
        $data = $request->input();

        $room->update([
            'hotel_id'          => $data['hotel_id'],
            'name'              => $data['name'],
            'room_type_id'      => $data['room_type_id'],
            'room_capacity_id'  => $data['room_capacity_id'],
            'image'             => $imageName
        ]);
        
        return redirect()->route('room-manager.index')->with('success','Room updated successfully');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('success', 'Room has been deleted Successfully');
    }
}
