<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nim'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group(){
        return $this->belongsTo(Group::class,'groupid','id');
    }

    public function pendidikan(){
        return $this->hasOne(Pendidikan::class,'nim_id','nim');
    }
    
    public function penghargaans(){
        return $this->hasMany(Penghargaan::class,'nim_id','nim');
    }
    public function seminars(){
        return $this->hasMany(Seminar::class,'nim_id','nim');
    }
}
