<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';

    public function type(){
        return $this->belongsTo(RoomType::class);
    }
}
