<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PKM_K extends Model
{
    //
    public $table = "pkm_k";

    public function biayas(){
        return $this->hasMany(Biaya::class,'groupid','id');
    }

    public function group(){
        return $this->belongsTo(Group::class,'groupid','id');
    }
}
