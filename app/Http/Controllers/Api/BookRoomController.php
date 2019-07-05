<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Booking;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookRoomController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::with([
            'room.type.cost',
            'customer'
        ])->get();

        return $this->respond($booking);
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
            'start_date'    =>  'required',
            'end_date'      =>  'required',
            'total_price'   =>  'required',
            'total_night'   =>  'required'
        ]);

        $data = $request->input();
        //check if user login
        if(is_null( $request->user() )){
            
            //Create user with customer information
            $user = User::create([
                'email'     => $data['email'],
                'password'  => Hash::make('password'),            
            ]);

            $customer = Customer::create([
                'user_id'       =>  $user->id,
                'first_name'    =>  $data['first_name'],
                'last_name'     =>  $data['last_name'],
                'phone'         =>  $data['phone'],
                'email'         =>  $user->email,            
            ]);

        }else{
            $customer = Customer::where('user_id', $request->user()->id)->first();
        }
        
        $booking = Booking::create([
            'room_id'       =>  $data['room_id'],
            'date_start'    =>  $data['start_date'],
            'date_end'      =>  $data['end_date'],
            'customer_id'   =>  $customer->id,
            'total_price'   =>  $data['total_price'],
            'total_night'   =>  $data['total_night']
        ]);

        return $this->respond($booking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return $this.respond($booking);
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
        return $this->respond(['message' => 'Resources deleted successfully!']);
    }
}
