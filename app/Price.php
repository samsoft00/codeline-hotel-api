<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';

    protected $hidden = [
        'created_at', 'updated_at', 'room_type_id'
    ];    

    public function type(){
        return $this->belongsTo(RoomType::class);
    }
}
