<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Booking;
use App\Customer;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'customer',
            'transaction'
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
            'total_night'   =>  'required',
            'tx_id'         =>  'required',
            'order_ref'     =>  'required',
            'payment_id'    =>  'required',
            'amount'        =>  'required', 
            'charged_amount'=>  'required', 
            'tx_ref'        =>  'required',
            'status'        =>  'required',
            'payment_type'  =>  'required'            
        ]);

        DB::beginTransaction();

        try {
            //code...

            $data = $request->input();
            $customer = Customer::where('user_id', $request->user()->id)->first();
    
            $tran = Transaction::create([
                'tx_id'             => $data['tx_id'],
                'amount'            => $data['amount'],
                'order_ref'         => $data['order_ref'], 
                'payment_id'        => $data['payment_id'], 
                'charged_amount'    => $data['charged_amount'], 
                'tx_ref'            => $data['tx_ref'],
                'status'            => $data['status'],
                'payment_type'      => $data['payment_type']    
            ]);
            
            $booking = Booking::create([
                'room_id'       =>  $data['room_id'],
                'date_start'    =>  $data['start_date'],
                'date_end'      =>  $data['end_date'],
                'customer_id'   =>  $customer->id,
                'total_price'   =>  $data['total_price'],
                'total_night'   =>  $data['total_night'],
                'transaction_id'=>  $tran->id
            ]);

            DB::commit();
    
            return $this->respond($booking);            

        } catch (\Exception $e) {
            //throw $e;
            DB::rollBack();
            return $this->setStatusCode(500)->respond($e->getMessage());
        }

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
