<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Group;
use App\Dosen;
use App\User;
use App\PKM;
use App\PKM_K;
use App\Pendidikan;
use App\Penghargaan;
use App\Seminar;
use App\Comment;
use Illuminate\Support\Facades\Hash;
use App\Feedback;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function loginpage(){
        return view('auth.login');
    }

    public function logindosen(){
        return view('Auth.loginDosen');
    }
    public function login(Request $request){
        $emaildosen = $request->input('emaildosen');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $emaildosen, 'password' => $password])){
            return redirect('/dosen');
        }
        else{
            return redirect('/loginstaff')->with('status', 'These credentials do not match our records.');
        }

    }
    public function registerstaff(){
        return view('Auth.registerDosen');
    }
    public function registprocess(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $kodedosen = $request->input('nim');
        $password = $request->input('password');
        $repass = $request->input('password_confirmation');

        $data = new User();
        $data->name = $name;
        $data->email = $email;
        $data->nim = $kodedosen;
        $data->roles = "DOSEN";
        if(User::where('nim',$kodedosen)->exists()){
            return redirect('/registerstaff')->with('status','These credentials has been registered.');
        }
        else if(User::where('email',$email)->exists()){
            return redirect('/registerstaff')->with('status','Email has been registered');
        }
        else if($password == $repass){
            $data->password = Hash::make($password);
            $data->save();
            if(Auth::attempt(['nim' => $kodedosen, 'password' => $password])){
                return redirect('/dosen');
            }
        }
        else{
            return redirect('/registerstaff')->with('status','Confirmation Password salah');
        }
    }

    public function index()
    {
        $auth = Auth::user()->groupid;
        $datas = User::with(['group'])->where('groupid',$auth)->get();

        $kodedosen = Group::where('id',$auth)->pluck('dosenid')->first();
        $datadosen = User::where('nim',$kodedosen)->first();
        
        $group = Group::where('id',$auth)->first();

        $pkm = PKM::where('groupid',$auth)->get();
        $pkmk = PKM_K::where('groupid',$auth)->get();
        $identitas = User::with(['pendidikan' , 'penghargaans'])->where('groupid',$auth)->get();

        return view('home',['datas'=>$datas,'dosen'=>$datadosen , 'pkms'=>$pkm , 'pkmk' => $pkmk , 'identitas' => $identitas , 'group' => $group]);
    }

    public function pkmComment(Request $request){
        $id = $request->input('id');
        $pkmkid = $request->input('idpkmk');
        $type = $request->input('type');
        if($type == 'PKM-Artikel Ilmiah' || $type == 'PKM-Gagasan Tertulis'){
            $pkm = PKM::where('id',$id)->first();
            $comment = Comment::where('pkmid',$id)->where('type',$type)->orderby('created_at','DESC')->get();
        }
        else{
            $pkm = PKM_K::where('id',$pkmkid)->first();
            $comment = Comment::where('pkmid',$pkmkid)->where('type',$type)->orderby('created_at','DESC')->get();
        }
        return view('commentPkm',['comments' => $comment , 'pkm' => $pkm , 'judul' => $pkm->title]);
    }

    public function pkm(Request $request)
    {
        $data = $request->input('pkm');
        $group = Auth::user()->groupid;
        $users = User::where('groupid',$group)->get();
        if($data == 'PKM-AI'){
            $type = 'PKM-Artikel Ilmiah';
            return view('pkm',['users'=>$users],['type'=>$type]);
        }
        else if($data == 'PKM-GT'){
            $type = "PKM-Gagasan Tertulis";
            return view('pkm',['users'=>$users],['type'=>$type]);
        }
        else if($data == 'PKM-KC'){
            $type = "PKM-Karsa Cipta";
            return view('pkmk',['users'=>$users],['type'=>$type]);
        }
        else{
            $type = "PKM-Kewirausahaan";
            return view('pkmk',['users'=>$users],['type'=>$type]);
        }
    }
    public function registerGroup(){
        $id = Auth::user()->nim;
        $user = User::where('nim',$id)->first();
        $data = User::where('roles','DOSEN')->get();
        return view('register',['datas'=>$data , 'user' => $user]);
    }

    public function profile(){
        $auth = User::where('nim',Auth::user()->nim)->first();
        $pendidikan = Pendidikan::where('nim_id',Auth::user()->nim)->first();
        $penghargaans = Penghargaan::where('nim_id',Auth::user()->nim)->get();
        $seminars = Seminar::where('nim_id',Auth::user()->nim)->get();
        $checkpenghargaan = Penghargaan::where('nim_id',Auth::user()->nim)->first();
        $checkseminar = Seminar::where('nim_id',Auth::user()->nim)->first();
        return view('profile',['auth' => $auth , 'pendidikan' => $pendidikan , 'penghargaans' => $penghargaans , 'checkpenghargaan' => $checkpenghargaan , 'checkseminar' => $checkseminar , 'seminars' => $seminars]);
    }

    public function update(Request $request){
        Validator::make($request->all(),[
            'jurusan' => 'required'
        ]
        ,
        [
            'jurusan.required' => 'Tempat Lahir tidak boleh kosong'
        ]);
        $nim = Auth::user()->nim;
        $jeniskelamin = $request->input('jeniskelamin');
        $jurusan = $request->input('jurusan');
        $bidangilmu = $request->input('bidangilmu');
        $nidn = $request->input('nidn');
        $tempatlahir = $request->input('tempat');
        $tanggallahir = $request->input('tanggal');
        $nomor = $request->input('handphone');
        $alamat = $request->input('alamat');

        //pendidikan
        $sd = $request->input('sd');
        $smp = $request->input('smp'); 
        $sma = $request->input('sma');
        $jurusansd = $request->input('jurusansd');   
        $jurusansmp = $request->input('jurusansmp'); 
        $jurusansma = $request->input('jurusansma');   
        $tanggalsd = $request->input('tanggalsd');
        $tanggalsmp = $request->input('tanggalsmp');
        $tanggalsma = $request->input('tanggalsma');   
        
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
            'bidangilmu' => $bidangilmu,
            'tempatlahir' => $tempatlahir,
            'tanggallahir' => $tanggallahir,
            'nomortelepon' => $nomor,
            'alamat' =>  $alamat,
            'nidn' => $nidn
        ]);

        if(Pendidikan::where('nim_id',Auth::user()->nim)->exists()){
            Pendidikan::where('nim_id',$nim)->update([
                'sd' => $sd,
                'smp' => $smp,
                'sma' => $sma,
                'jurusansd' => $jurusansd,
                'jurusansmp' => $jurusansmp,
                'jurusansma' => $jurusansma,
                'tahunsd' => $tanggalsd,
                'tahunsmp' => $tanggalsmp,
                'tahunsma' => $tanggalsma   
            ]);
        }
        else{
            $pendidikan = new Pendidikan();
            $pendidikan->nim_id = $nim;
            $pendidikan->sd = $sd;
            $pendidikan->smp = $smp;
            $pendidikan->sma = $sma;
            $pendidikan->jurusansd = $jurusansd;
            $pendidikan->jurusansmp = $jurusansmp;
            $pendidikan->jurusansma = $jurusansma;
            $pendidikan->tahunsd = $tanggalsd;
            $pendidikan->tahunsmp = $tanggalsmp;
            $pendidikan->tahunsma = $tanggalsma;
            $pendidikan->save();
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
        

        return redirect('/profile')->with('status','Profile successfully updated');
    }

    public function feedback(){
        return view('feedback');
    }
    public function sendFeedback(Request $request){
        $NIM = $request->input('nim');
        $feedback = $request->input('feedback');
        $data = new feedback();
        $data->nim = $NIM;
        $data->feedback = $feedback;
        $data->save();
        return redirect('/');
    }
    
}
