<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Biaya;
use App\PKM;
use App\PKM_K;
class Group extends Model
{
    //
    public function users(){
        return $this->hasMany(User::class,'groupid','id');
    }

    public function pkms(){
        return $this->hasMany(PKM::class,'groupid','id');
    }
    public function pkmks(){
        return $this->hasMany(PKM_K::class,'groupid','id');
    }

}
