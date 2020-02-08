<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    //
    public $table = "pendidikans";

    public function user(){
        return $this->belongsTo(User::class,'nim_id','nim');
    }
}
