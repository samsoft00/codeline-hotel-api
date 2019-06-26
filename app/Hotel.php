<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'state', 'country', 'zipcode', 'phone_number', 'email', 'image'
    ];
    
    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
