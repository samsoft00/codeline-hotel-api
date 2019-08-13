<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'tx_id',
        'amount',
        'order_ref', 
        'payment_id', 
        'charged_amount', 
        'tx_ref',
        'status',
        'payment_type'
    ];      
}
