<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\User;
use App\PKM;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;

class GroupController extends Controller
{
    //
    

    public function registergroup(Request $request){
        //init
        $identity = Auth::user()->nim;
        $dosenid = $request->input('dosen');
        $member1 = $request->input('member1');
        $member2 = $request->input('member2');
        $member3 = $request->input('member3');
        $member4 = $request->input('member4');
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');
        $password3 = $request->input('password3');
        $password4 = $request->input('password4');

        //new
        $data = new Group;
        $data->dosenid = $dosenid; 
        if($dosenid == NULL){
            return redirect('/registergroup')->with('message', 'Dosen Belum dipilih');
        }
        else{
            $data->save();

            $groupid = $data->id;

            $user1 = User::where('nim',$member1)->first();
            $user2 = User::where('nim',$member2)->first();
            $user3 = User::where('nim',$member3)->first();
            $user4 = User::where('nim',$member4)->first();

            if($member1 != NULL){
                if(!(Hash::check($password1 , $user1->password))){
                    return redirect('/registergroup')->with('message', 'Password salah!');
                }
                else if(Auth::user()->nim == $member1){
                    return redirect('/registergroup')->with('message', 'NIM tidak valid');
                }
            }
            if($member2 != NULL){
                if(!(Hash::check($password2 , $user2->password))){
                    return redirect('/registergroup')->with('message', 'Password salah!');
                }
                else if(Auth::user()->nim == $member2){
                    return redirect('/registergroup')->with('message', 'NIM tidak valid');
                }
            }
            if($member3 != NULL){
                if(!(Hash::check($password3 , $user3->password))){
                    return redirect('/registergroup')->with('message', 'Password salah!');
                }
                else if(Auth::user()->nim == $member3){
                    return redirect('/registergroup')->with('message', 'NIM tidak valid');
                }
            }
            if($member4 != NULL){
                if(!(Hash::check($password4 , $user4->password))){
                    return redirect('/registergroup')->with('message', 'Password salah!');
                }
                else if(Auth::user()->nim == $member4){
                    return redirect('/registergroup')->with('message', 'NIM tidak valid');
                }
            }

            User::where('nim',$identity)->update(['groupid' => $groupid , 'susunanorganisasi' => 'Ketua']);
            User::where('nim',$member1)->update(['groupid' => $groupid , 'susunanorganisasi' => 'Anggota 1']);
            User::where('nim',$member2)->update(['groupid' => $groupid , 'susunanorganisasi' => 'Anggota 2']);
            User::where('nim',$member3)->update(['groupid' => $groupid , 'susunanorganisasi' => 'Anggota 3']);
            User::where('nim',$member4)->update(['groupid' => $groupid , 'susunanorganisasi' => 'Anggota 4']);

        }
        if(Auth::user()->jurusan == NULL){
            return redirect('/profile');
        }
        return redirect('/home');
    }
}
