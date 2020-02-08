<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class,'nim_id','nim');
    }
}
