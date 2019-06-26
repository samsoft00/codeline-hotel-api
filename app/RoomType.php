<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public $timestamps = false;

    protected $table = 'room_type';

    protected $fillable = ['type'];

    public function cost(){
        return $this->hasOne(Price::class, 'room_type_id', 'id');
    }
}
