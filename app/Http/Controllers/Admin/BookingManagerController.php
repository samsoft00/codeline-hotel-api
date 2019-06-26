<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\Customer;

class BookingManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::with(['room', 'customer'])->get();
        // dd($bookings);
        return view('booking-manager.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $customers = Customer::all();
        return view('booking-manager.create', compact(['rooms', 'customers']));
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
            'room_id'       =>  'required',
            'date_start'    =>  'required',
            'date_end'      =>  'required',
            'customer_id'   =>  'required',
            'total_price'   =>  'required',
            'total_night'   =>  'required'
        ]);

        $data = $request->input();
        Booking::create([
            'room_id'       =>  $data['room_id'],
            'date_start'    =>  $data['date_start'],
            'date_end'      =>  $data['date_end'],
            'customer_id'   =>  $data['customer_id'],
            'total_price'   =>  $data['total_price'],
            'total_night'   =>  $data['total_night']
        ]);

        return redirect()->route('booking-manager.index')->with('success','You have successfully add Booking.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('booking-manager.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $rooms = Room::all();
        $customers = Customer::all();
        return view('booking-manager.edit', compact(['booking', 'rooms', 'customers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'room_id'       =>  'required',
            'date_start'    =>  'required',
            'date_end'      =>  'required',
            'customer_id'   =>  'required',
            'total_price'   =>  'required',
            'total_night'   =>  'required'
        ]);

        $data = $request->input();
        $booking->update([
            'room_id'       =>  $data['room_id'],
            'date_start'    =>  $data['date_start'],
            'date_end'      =>  $data['date_end'],
            'customer_id'   =>  $data['customer_id'],
            'total_price'   =>  $data['total_price'],
            'total_night'   =>  $data['total_night']
        ]);

        return redirect()->route('booking-manager.index')->with('success','Room updated successfully');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking has been deleted Successfully');
    }
}
