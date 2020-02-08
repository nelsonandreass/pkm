<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PKM;
use App\PKM_K;
use App\User;
use App\Group;
use App\Biaya;
use App\Jadwal;
use PDF;

class PkmController extends Controller
{
    //
    public function store(Request $request){
        $groupid = Auth::user()->groupid;
        $judul =  $request->input('judul');
        $pendahuluan  = $request->input('pendahuluan');
        $gagasan = $request->input('gagasan');
        $kesimpulan = $request->input('kesimpulan');
        $daftarpustaka = $request->input('daftarpustaka');
        $type = $request->input('type');

        $data = new PKM();
        $data->groupid = $groupid;
        $data->title = $judul;
        $data->type = $type;
        $data->pendahuluan = $pendahuluan;
        $data->gagasan = $gagasan;
        $data->kesimpulan = $kesimpulan;
        $data->daftarpustaka = $daftarpustaka;
        $data->save();
        return redirect('/home');
    }
    
    public function pkmkstore(Request $request){
        $groupid = Auth::user()->groupid;
        $judul =  $request->input('judul');
        $pendahuluan  = $request->input('pendahuluan');
        $tinjauan = $request->input('tinjauanpustaka');
        $metodepelaksanaan = $request->input('metodepelaksanaan');
        $daftarpustaka = $request->input('daftarpustaka');  
        $type = $request->input('type');

        //biaya
        //penunjang
        $materialpenunjang = $request->input('materialpenunjang');
        $justifikasipenunjang = $request->input('justifikasipenunjang');
        $kuantitaspenunjang = $request->input('kuantitaspenunjang');
        $hargapenunjang = $request->input('kuantitaspenunjang');
        //habispakai
        $materialhabispakai = $request->input('materialhabispakai');
        $justifikasihabispakai = $request->input('justifikasihabispakai');
        $kuantitashabispakai = $request->input('kuantitashabispakai');
        $hargahabispakai = $request->input('kuantitashabispakai');
        //perjalanan
        $materialperjalanan = $request->input('materialperjalanan');
        $justifikasiperjalanan = $request->input('justifikasiperjalanan');
        $kuantitasperjalanan = $request->input('kuantitasperjalanan');
        $hargaperjalanan = $request->input('kuantitasperjalanan');
        //lainlain
        $materiallain = $request->input('materiallain');
        $justifikasilain = $request->input('justifikasilain');
        $kuantitaslain = $request->input('kuantitaslain');
        $hargalain = $request->input('kuantitaslain');

        $alokasiwaktu = $request->input('alokasiwaktu');
        $uraiantugas = $request->input('uraiantugas');


        $data = new PKM_K();
        $data->groupid = $groupid;
        $data->title = $judul;
        $data->type = $type;
        $data->pendahuluan = $pendahuluan;
        $data->tinjauanpustaka = $tinjauan;
        $data->metodepelaksanaan = $metodepelaksanaan;
        $data->daftarpustaka = $daftarpustaka;
        $data->save();
        $pkmid = $data->id;
        
        //save biaya
            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Peralatan Penunjang";
            $data->material = $materialpenunjang;
            $data->justifikasipemakaian = $justifikasipenunjang;
            $data->kuantitas = $kuantitaspenunjang;
            $data->hargasatuan = $hargapenunjang;
            $data->save();

            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Bahan Habis Pakai";
            $data->material = $materialhabispakai;
            $data->justifikasipemakaian = $justifikasihabispakai;
            $data->kuantitas = $kuantitashabispakai;
            $data->hargasatuan = $hargahabispakai;
            $data->save();

            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Perjalanan";
            $data->material = $materialperjalanan;
            $data->justifikasipemakaian = $justifikasiperjalanan;
            $data->kuantitas = $kuantitasperjalanan;
            $data->hargasatuan = $hargaperjalanan;
            $data->save();

            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Lain-lain";
            $data->material = $materiallain;
            $data->justifikasipemakaian = $justifikasilain;
            $data->kuantitas = $kuantitaslain;
            $data->hargasatuan = $hargalain;
            $data->save();

        User::where('nim',Auth::user()->nim)->update(['alokasiwaktu' => $alokasiwaktu , 'uraiantugas' => $uraiantugas]);
        return redirect('/home');
    }

    public function edit(Request $request){
        $id = $request->input('id');
        $groupid = Auth::user()->groupid;
        $item = PKM::where('id',$id)->first();
        $users = User::where('groupid',$groupid)->get();
        return view('editpkm',['items' => $item, 'users' => $users]);
    }

    public function pkmkedit(Request $request){
        $id = $request->input('idpkmk');
        $groupid = Auth::user()->groupid;
        $item = PKM_K::where('id',$id)->first();
        $users = User::where('groupid',$groupid)->get();
        

        //biaya
        $penunjang = Biaya::where('pkmid',$id)->where('jenisbiaya','Peralatan Penunjang')->first();
        $habispakai =  Biaya::where('pkmid',$id)->where('jenisbiaya','Bahan Habis Pakai')->first();
        $perjalanan = Biaya::where('pkmid',$id)->where('jenisbiaya','Perjalanan')->first();
        $lainlain = Biaya::where('pkmid',$id)->where('jenisbiaya','Lain-lain')->first();

        return view('editpkmk',['items' => $item, 'users' => $users , 'penunjang' => $penunjang , 'habispakai' => $habispakai ,'perjalanan' => $perjalanan, 'lainlain'=>$lainlain]);
    }

    public function update(Request $request){
        $id = $request->input('id');
        $judul = $request->input('judul');
        $pendahuluan = $request->input('pendahuluan');
        $gagasan = $request->input('gagasan');
        $kesimpulan = $request->input('kesimpulan');
        $daftarpustaka = $request->input('daftarpustaka');

        //susunan organisasi
        $alokasiwaktu = $request->input('alokasiwaktu');
        $uraiantugas = $request->input('uraiantugas');
        
        PKM::where('id',$id)->update(['title' => $judul , 'pendahuluan' => $pendahuluan , 'gagasan' => $gagasan , 'kesimpulan' => $kesimpulan, 'daftarpustaka' => $daftarpustaka]);
        User::where('nim',Auth::user()->nim)->update(['alokasiwaktu' => $alokasiwaktu , 'uraiantugas' => $uraiantugas]);
        
        $groupid = Auth::user()->groupid;
        $item = PKM::where('id',$id)->first();
        $users = User::where('groupid',$groupid)->get();
        return redirect()->back()->with('status','Update successfuly');
    }

    public function pkmkupdate(Request $request){
        $pkmid = $request->input('pkmkid');
        $id = Auth::user()->groupid;
        $judul = $request->input('judul');
        $pendahuluan = $request->input('pendahuluan');
        $tinjauanpustaka = $request->input('tinjauanpustaka');
        $metodepelaksanaan = $request->input('metodepelaksanaan');
        $daftarpustaka = $request->input('daftarpustaka');

        //susunan organisasi
        $alokasiwaktu = $request->input('alokasiwaktu');
        $uraiantugas = $request->input('uraiantugas');

        //biaya
        //penunjang
        $materialpenunjang = $request->input('materialpenunjang');
        $justifikasipenunjang = $request->input('justifikasipenunjang');
        $kuantitaspenunjang = $request->input('kuantitaspenunjang');
        $hargapenunjang = $request->input('hargapenunjang');
        //habispakai
        $materialhabispakai = $request->input('materialhabispakai');
        $justifikasihabispakai = $request->input('justifikasihabispakai');
        $kuantitashabispakai = $request->input('kuantitashabispakai');
        $hargahabispakai = $request->input('hargahabispakai');
        //perjalanan
        $materialperjalanan = $request->input('materialperjalanan');
        $justifikasiperjalanan = $request->input('justifikasiperjalanan');
        $kuantitasperjalanan = $request->input('kuantitasperjalanan');
        $hargaperjalanan = $request->input('hargaperjalanan');
        //lainlain
        $materiallain = $request->input('materiallain');
        $justifikasilain = $request->input('justifikasilain');
        $kuantitaslain = $request->input('kuantitaslain');
        $hargalain = $request->input('hargalain');

        //jadwal
        $kegiatan = $request->name;
        $bulan1 = $request->number1;
        $bulan2 = $request->number2;
        $bulan3 = $request->number3;
        $bulan4 = $request->number4;
        $bulan5 = $request->number5;

        //save
        PKM_K::where('groupid',$id)->update(['title' => $judul , 'pendahuluan' => $pendahuluan , 'tinjauanpustaka' => $tinjauanpustaka , 'metodepelaksanaan' => $metodepelaksanaan, 'daftarpustaka' => $daftarpustaka]);
        User::where('nim',Auth::user()->nim)->update(['alokasiwaktu' => $alokasiwaktu , 'uraiantugas' => $uraiantugas]);
        
        if(Biaya::where('pkmid',$pkmid)->exists()){
            Biaya::where('pkmid',$pkmid)->where('jenisbiaya','=','Peralatan Penunjang')->update([ 'jenisbiaya' => "Peralatan Penunjang" ,'material' => $materialpenunjang, 'justifikasipemakaian' => $justifikasipenunjang , 'kuantitas' => $kuantitaspenunjang , 'hargasatuan' => $hargapenunjang]);
            
            Biaya::where('pkmid',$pkmid)->where('jenisbiaya','=','Bahan Habis Pakai')->update(['jenisbiaya' => "Bahan Habis Pakai", 'material'=> $materialhabispakai , 'justifikasipemakaian' => $justifikasihabispakai , 'kuantitas' => $kuantitashabispakai , 'hargasatuan' => $hargahabispakai]);

            Biaya::where('pkmid',$pkmid)->where('jenisbiaya','=','Perjalanan')->update(['pkmid' => $pkmid , 'jenisbiaya' => "Perjalanan" ,'material' => $materialperjalanan, 'justifikasipemakaian' => $justifikasiperjalanan , 'kuantitas' => $kuantitasperjalanan , 'hargasatuan' => $hargaperjalanan]);

            Biaya::where('pkmid',$pkmid)->where('jenisbiaya','=','Lain-lain')->update(['pkmid' => $pkmid , 'jenisbiaya' => "Lain-lain" , 'material' => $materiallain,'justifikasipemakaian' => $justifikasilain , 'kuantitas' => $kuantitaslain , 'hargasatuan' => $hargalain]);
            
        }
        else{
            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Peralatan Penunjang";
            $data->material = $materialpenunjang;
            $data->justifikasipemakaian = $justifikasipenunjang;
            $data->kuantitas = $kuantitaspenunjang;
            $data->hargasatuan = $hargapenunjang;
            $data->save();

            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Bahan Habis Pakai";
            $data->material = $materialhabispakai;
            $data->justifikasipemakaian = $justifikasihabispakai;
            $data->kuantitas = $kuantitashabispakai;
            $data->hargasatuan = $hargahabispakai;
            $data->save();

            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Perjalanan";
            $data->material = $materialperjalanan;
            $data->justifikasipemakaian = $justifikasiperjalanan;
            $data->kuantitas = $kuantitasperjalanan;
            $data->hargasatuan = $hargaperjalanan;
            $data->save();

            $data = new Biaya();
            $data->pkmid =  $pkmid;
            $data->jenisbiaya = "Lain-lain";
            $data->material = $materiallain;
            $data->justifikasipemakaian = $justifikasilain;
            $data->kuantitas = $kuantitaslain;
            $data->hargasatuan = $hargalain;
            $data->save();
        }
        // foreach($kegiatan as $data){
        //     $data = new Jadwal();
        //     $data->pkmid = $pkmid;
        //     $data->kegiatan = $kegiatan;
           
        //     $data->save();
        // }
        return redirect()->back()->with('status','Update successfuly');
    }

    public function delete(Request $request){
        $id = $request->input('id');
        PKM::where('id',$id)->delete();
        return redirect('/home');
    }

    public function pkmkdelete(Request $request){
        $id = $request->input('idpkmk');
        PKM_K::where('id',$id)->delete();
        return redirect('/home');
    }


    public function generate($id){
        $item = PKM::where('id',$id)->first();
        $users = User::where('groupid',$item->groupid)->get();
        $ketua = User::where('groupid',$item->groupid)->where('susunanorganisasi','Ketua')->first();
        $anggota = User::where('groupid',$item->groupid)->count();

        //data dosen
        $kodedosen = Group::where('id',$item->groupid)->pluck('dosenid')->first();
        $datadosen = User::with(['pendidikan' , 'penghargaans' , 'seminars'])->where('nim',$kodedosen)->first();
        
        //identitas kelompok
        $identitas = User::with(['pendidikan' , 'penghargaans' , 'seminars'])->where('groupid',Auth::user()->groupid)->get();
        
        $pdf = PDF::loadView('pdf.pdfpkm',['items' => $item, 'users' => $users, 'ketua' => $ketua, 'anggota' => $anggota, 'dosens' => $datadosen , 'identitas' => $identitas]);
        $pdf->getDomPDF()->set_option("enable_php", true);

        return $pdf->download('pkm.pdf');
    }

    public function pkmkgenerate($id){
        $item = PKM_K::where('id',$id)->firstOrFail();
        $users = User::where('groupid',$item->groupid)->get();
        $ketua = User::where('groupid',$item->groupid)->where('susunanorganisasi','Ketua')->first();
        $anggota = User::where('groupid',$item->groupid)->count();

        //data dosen
        $kodedosen = Group::where('id',$item->groupid)->pluck('dosenid')->first();
        $datadosen = User::with(['pendidikan' , 'penghargaans' , 'seminars'])->where('nim',$kodedosen)->first();
        //$datadosen = User::where('nim',$kodedosen)->first();
        
        //identitas kelompok
        $identitas = User::with(['pendidikan' , 'penghargaans' , 'seminars'])->where('groupid',Auth::user()->groupid)->get();
        
        //biaya penunjang
        $biayapenunjang = Biaya::where('pkmid',$item->id)->where('jenisbiaya',"Peralatan Penunjang")->firstOrFail();
        //biaya habis pakai
        $biayahabispakai = Biaya::where('pkmid',$item->id)->where('jenisbiaya',"Bahan Habis Pakai")->firstOrFail();
        //biaya perjalanan
        $biayaperjalanan = Biaya::where('pkmid',$item->id)->where('jenisbiaya',"Perjalanan")->firstOrFail();
        //biaya lain lain
        $biayalainlain = Biaya::where('pkmid',$item->id)->where('jenisbiaya',"Lain-Lain")->firstOrFail();

        $pdf = PDF::loadView('pdf.pdfpkmk',['items' => $item, 'users' => $users, 'ketua' => $ketua, 'anggota' => $anggota, 'dosens' => $datadosen , 'identitas' => $identitas , 'penunjang' => $biayapenunjang, 'habispakai' => $biayahabispakai, 'perjalanan' => $biayaperjalanan, 'lainlain' => $biayalainlain]);
        
        
        $pdf->getDomPDF()->set_option("enable_php", true);

        return $pdf->download('pkm.pdf');
    }


    public function view($id){
        $item = PKM::where('groupid',$id)->first();
        $users = User::where('groupid',$id)->get();
        $ketua = User::where('groupid',$id)->first();
        
        $pdf = PDF::loadView('pdf.pdfpkm',['items' => $item, 'users' => $users, 'ketua' => $ketua]);
        return $pdf->stream('pkm.pdf');
    }

    public function send($id){
        return $this->sendtodosen($id);
    }

    public function sendtodosen($id){
        PKM::where('id',$id)->update(['status'=> 'Waiting to be Reviewed']);
        return redirect('/home')->with('status','Sent successfuly');
    }

    public function pkmksend($id){
        return $this->pkmksendtodosen($id);
    }

    public function pkmksendtodosen($id){
        PKM_K::where('id',$id)->update(['status'=> 'Waiting to be Reviewed']);
        return redirect('/home');
    }
}
