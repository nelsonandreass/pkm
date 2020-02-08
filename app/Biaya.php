<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PKM_K;
class Biaya extends Model
{
    //
    public function PKM_K(){
        return $this->belongsTo(PKM_K::class,'groupid','id');
    }
}
