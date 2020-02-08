<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Dosen;
use App\User;
use App\PKM;
use App\PKM_K;
use App\Pendidikan;
use App\Penghargaan;
use App\Seminar;
use App\Comment;

class DosenController extends Controller
{
    //

    public function index(){
        //dashboard
        $count = Group::where('dosenid',Auth::user()->nim)->count();
        
        //pkm 
        $pkm = Group::with(['pkms'])->where('dosenid',Auth::user()->nim)->get();
    $pkmk = Group::with(['pkmks'])->where('dosenid',Auth::user()->nim)->get();
        return view('dosen.dosenHome' , ['group' => $count , 'pkmgt' => $pkm ,'pkmk' => $pkmk]);
    }

    public function profile(){
        $auth = User::where('nim',Auth::user()->nim)->first();
        $pendidikan = Pendidikan::where('nim_id',Auth::user()->nim)->first();
        $penghargaans = Penghargaan::where('nim_id',Auth::user()->nim)->get();
        $seminars = Seminar::where('nim_id',Auth::user()->nim)->get();
        $checkpenghargaan = Penghargaan::where('nim_id',Auth::user()->nim)->first();
        $checkseminar = Seminar::where('nim_id',Auth::user()->nim)->first();
        return view('dosen.dosenProfile',['auth' => $auth , 'pendidikan' => $pendidikan , 'penghargaans' => $penghargaans , 'checkpenghargaan' => $checkpenghargaan , 'checkseminar' => $checkseminar , 'seminars' => $seminars]);
    }

    public function update(Request $request){
        $nim = Auth::user()->nim;
        $jeniskelamin = $request->input('jeniskelamin');
        $jurusan = $request->input('jurusan');
        $nidn = $request->input('nidn');
        $tempatlahir = $request->input('tempat');
        $tanggallahir = $request->input('tanggal');
        $nomor = $request->input('handphone');
        $alamat = $request->input('alamat');

        //pendidikan
        $s1 = $request->input('s1');
        $s2 = $request->input('s2');
        $s3 = $request->input('s3');
        $jurusans1 = $request->input('jurusans1');
        $jurusans2 = $request->input('jurusans2');
        $jurusans3 = $request->input('jurusans3');
        $tahuns1 = $request->input('tahuns1');
        $tahuns2 = $request->input('tahuns2');
        $tahuns3 = $request->input('tahuns3');

        //penghargaan
        $penghargaan1 = $request->input('jenispenghargaan1');
        $institusi1 = $request->input('institusi1');
        $tahun1 = $request->input('tahun1');
        $penghargaan2 = $request->input('jenispenghargaan2');
        $institusi2 = $request->input('institusi2');
        $tahun2 = $request->input('tahun2');

        //seminar
        $namaseminar1 = $request->input('namaseminar1');
        $judulseminar1 = $request->input('judulseminar1');
        $waktu1 = $request->input('waktu1');
        $namaseminar2 = $request->input('namaseminar2');
        $judulseminar2 = $request->input('judulseminar2');
        $waktu2 = $request->input('waktu2');


        User::where('nim',$nim)->update([
            'jeniskelamin' => $jeniskelamin, 
            'jurusan' => $jurusan,
            'tempatlahir' => $tempatlahir,
            'tanggallahir' => $tanggallahir,
            'nomortelepon' => $nomor,
            'alamat' =>  $alamat,
            'nidn' => $nidn
        ]);

        if(Pendidikan::where('nim_id',Auth::user()->nim)->exists()){
            Pendidikan::where('nim_id',$nim)->update([
                's1' => $s1,
                's2' => $s2,
                's3' => $s3,
                'jurusans1' => $jurusans1,
                'jurusans2' => $jurusans2,
                'jurusans3' => $jurusans3,
                'tahuns1' => $tahuns1,
                'tahuns2' => $tahuns2,
                'tahuns3' => $tahuns3,
            ]);
        }
        else{   
            $data = new Pendidikan();
            $data->nim_id = $nim;
            $data->s1 = $s1;
            $data->s2 = $s2;
            $data->s3 = $s3;
            $data->jurusans1 = $jurusans1;
            $data->jurusans2 = $jurusans2;
            $data->jurusans3 = $jurusans3;
            $data->tahuns1 = $tahuns1;
            $data->tahuns2 = $tahuns2;
            $data->tahuns3 = $tahuns3;
            $data->save();
        }

        if(Penghargaan::where('nim_id',Auth::user()->nim)->exists()){
            Penghargaan::where('nim_id',$nim)->update([
                'jenispenghargaan1' => $penghargaan1,
                'institusi1' => $institusi1,
                'tahun1' => $tahun1,
                'jenispenghargaan2' => $penghargaan2,
                'institusi2' => $institusi2,
                'tahun2' => $tahun2,
            ]);
        }
        else{
            $penghargaan = new Penghargaan();
            $penghargaan->nim_id = $nim;
            $penghargaan->jenispenghargaan1 = $penghargaan1;
            $penghargaan->institusi1 = $institusi1;
            $penghargaan->tahun1 = $tahun1;
            $penghargaan->jenispenghargaan2 = $penghargaan2;
            $penghargaan->institusi2 = $institusi2;
            $penghargaan->tahun2 = $tahun2;
            $penghargaan->save();
        }

        if(Seminar::where('nim_id',Auth::user()->nim)->exists()){
            Seminar::where('nim_id',$nim)->update([
                'namaseminar1' => $namaseminar1,
                'judulseminar1' => $judulseminar1,
                'waktu1' => $waktu1,
                'namaseminar2' => $namaseminar2,
                'judulseminar2' => $judulseminar2,
                'waktu2' => $waktu2
            ]);
        }
        else{
            $seminar = new Seminar();
            $seminar->nim_id = $nim;
            $seminar->namaseminar1 = $namaseminar1;
            $seminar->judulseminar1 = $judulseminar1;
            $seminar->waktu1 = $waktu1;
            $seminar->namaseminar2 = $namaseminar2;
            $seminar->judulseminar2 = $judulseminar1;
            $seminar->waktu2 = $waktu2;
            $seminar->save();     
        }
    
        return redirect('/dosen');
    }

    public function grouplist(){
        $dosenid = Auth::user()->nim;
        $groupid = Group::where('dosenid',$dosenid)->get();
        $grouplist = Group::where('dosenid',$dosenid)->count();
        $notyetpkm = PKM::where('groupid',$groupid)->where('status' , 'Revised')->count();
        $notyetpkmk = PKM_K::where('groupid',$groupid)->where('status' , 'Revised')->count();
        $notyet = $notyetpkm;
        return view('dosen.dosenGroup',['group' => $grouplist , 'notyet' => $groupid]);
    }


    public function addcomment(Request $request){
        $pkm = $request->input('pkmid');
        $pkmtype = $request->input('type');
        $comment = $request->input('comment');
        $data = new Comment();
        $data->pkmid = $pkm;
        $data->type = $pkmtype;
        $data->comment = $comment;
        $data->save();
        if($pkmtype == 'PKM-Artikel Ilmiah' || $pkmtype == 'PKM-Gagasan Tertulis'){
            PKM::where('id',$pkm)->update(['status'=>'Revised']);
        }
        else{
            PKM_K::where('id',$pkm)->update(['status'=>'Revised']);
        }
        return redirect('/dosen');
    }

    public function approve(Request $request){
        $pkm = $request->input('pkmid');
        PKM::where('id',$pkm)->update(['status' => 'Approved']);
        return redirect('/dosen');
    }
    
    public function viewpkm(Request $request){
        $id = $request->input('pkm');
        $pkmdata = PKM::where('id',$id)->first();
        $users = User::where('groupid',$pkmdata->groupid)->get();
        return view('dosen.dosenViewPkm', ['pkm' => $pkmdata , 'users' => $users]);
    }
    
    public function viewpkmk(Request $request){
        $id = $request->input('pkmk');
        $pkmdata = PKM_K::where('id',$id)->first();
        $users = User::where('groupid',$pkmdata->groupid)->get();
        return view('dosen.dosenViewPkmk', ['pkmk' => $pkmdata , 'users' => $users]);
    }
   
    public function viewDetail(Request $request){   
        $pkmid = $request->input('pkm');
        $groupid = PKM::where('id',$pkmid)->first();
        $group = User::where('groupid',$groupid->groupid)->get();
        return view('dosen.dosenViewDetail' , ['users' => $group , 'pkm' => $groupid]);
    }
    
    public function viewDetailPKMK(Request $request){
        $pkmid = $request->input('pkmk');
        $groupid = PKM_K::where('id',$pkmid)->first();
        $group = User::where('groupid',$groupid->groupid)->get();
        return view('dosen.dosenViewDetail' , ['users' => $group , 'pkm' => $groupid]);
    }
}
