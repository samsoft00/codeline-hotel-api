<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public $timestamps = false;

    protected $table = 'room_type';

    public function cost(){
        return $this->hasOne(Price::class, 'id', 'room_type_id');
    }
}
