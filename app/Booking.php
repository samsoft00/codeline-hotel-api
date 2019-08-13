<?php

namespace App;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id', 
        'date_start', 
        'date_end', 
        'customer_id', 
        'total_night', 
        'total_price',
        'transaction_id'
    ];

    public function room(){
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }    
}
