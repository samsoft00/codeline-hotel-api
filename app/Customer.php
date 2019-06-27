<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone', 'email', 'address', 'city', 'country', 'fax'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
