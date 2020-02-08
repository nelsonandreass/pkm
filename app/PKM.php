<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;

class PKM extends Model
{
    //
    public $table = "pkms";

    public function group(){
        return $this->belongsTo(Group::class,'groupid','id');
    }
    
}
