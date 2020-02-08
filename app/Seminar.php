<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class,'nim_id','nim');
    }
}
