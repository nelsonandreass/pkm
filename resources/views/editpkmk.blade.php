@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
       </div>
    @endif
    <div class="row">
        <div class="col-1"></div>
        <div class="card col-10 ">
            <form action="{{url('/pkmkupdate')}}" method="POST" class="form-group mt-2">
                @csrf
                <input type="hidden" name="pkmkid" value="{{$items->id}}">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 ">
                        <img src="/binus.png" width="100%" alt="">
                        <p class="text-center"><b>PROGRAM KREATIVITAS MAHASISWA</b></p>
                    </div>
                </div>

                
                <div class="form-group centered">
                    <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{$items->title}}">
                </div>

                <p class="text-center"><b>BIDANG KEGIATAN :</b></p>
                <p class="text-center" name="type">{{$items->type}}</p>
                <br><br><br>
                
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <table width="100%">
                            @foreach($users as $user)
                                <tr class="text-center">
                                    <td width="33%">{{$user->name}}</td>
                                    <td width="33%">{{$user->nim}}</td>
                                    <td width="33%"><?php echo date("Y"); ?></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                
                <br><br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 text-center" >
                        <b>UNIVERSITAS BINA NUSANTARA</b>
                                <br>
                                <b>JAKARTA</b>
                                <br>
                                <b><?php echo date("Y"); ?></b>
                        
                    </div>
                </div>
            

                <div class="form-group">
                    <label for="pendahuluan">Pendahuluan</label>
                    <textarea name="pendahuluan" id="" rows="10" class="pendahuluan w-100 form-control" placeholder="Pendahuluan" >{{$items->pendahuluan}}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="tinjauanpustaka">Tinjauan Pustaka</label>
                    <textarea name="tinjauanpustaka" id="" rows="10" class="gagasan w-100 form-control">{{$items->tinjauanpustaka}}</textarea>
                </div>

                <div class="form-group">
                    <label for="metodepelaksanaan">Metode Pelaksanaan</label>
                    <textarea name="metodepelaksanaan" id="" rows="10" class="kesimpulan w-100 form-control">{{$items->metodepelaksanaan}}</textarea>
                </div>

                <div class="form-group">
                    <label for="daftarpustaka">Daftar Pustaka</label>
                    <textarea name="daftarpustaka" id="" rows="10" class="daftarpustaka w-100 form-control">{{$items->daftarpustaka}}</textarea>
                </div>

              

                <div class="form-gorup">   
                    <span>Biaya Peralatan Penunjang</span>
                    <table class="table">
                        <thead>
                            <th>Material</th>
                            <th>Justifikasi Pemakaian</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan (Rp)</th>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="text" name="materialpenunjang" value="{{$penunjang->material}}"></td>
                                <td><input class="form-control" type="number" name="justifikasipenunjang" value="{{$penunjang->justifikasipemakaian}}"></td>
                                <td><input class="form-control" type="number" name="kuantitaspenunjang" value="{{$penunjang->kuantitas}}"></td>
                                <td><input class="form-control" type="number" name="hargapenunjang" id="harga" value="{{$penunjang->hargasatuan}}"></td>  
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-gorup">   
                    <span>Biaya Habis Pakai</span>
                    <table class="table">
                        <thead>
                            <th>Material</th>
                            <th>Justifikasi Pemakaian</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan (Rp)</th>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="text" name="materialhabispakai" value="{{$habispakai->material}}"></td>
                                <td><input class="form-control" type="number" name="justifikasihabispakai" value="{{$habispakai->justifikasipemakaian}}"></td>
                                <td><input class="form-control" type="number" name="kuantitashabispakai" value="{{$habispakai->kuantitas}}"></td>
                                <td><input class="form-control" type="number" name="hargahabispakai" id="harga" value="{{$habispakai->hargasatuan}}"></td>  
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-gorup">   
                    <span>Biaya Perjalanan</span>
                    <table class="table">
                        <thead>
                            <th>Material</th>
                            <th>Justifikasi Pemakaian</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan (Rp)</th>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="text" name="materialperjalanan" value="{{$perjalanan->material}}"></td>
                                <td><input class="form-control" type="number" name="justifikasiperjalanan" value="{{$perjalanan->justifikasipemakaian}}"></td>
                                <td><input class="form-control" type="number" name="kuantitasperjalanan" value="{{$perjalanan->kuantitas}}"></td>
                                <td><input class="form-control" type="number" name="hargaperjalanan" id="harga" value="{{$perjalanan->hargasatuan}}"></td>  
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-gorup">   
                    <span>Biaya Lain-lain</span>
                    <table class="table">
                        <thead>
                            <th>Material</th>
                            <th>Justifikasi Pemakaian</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan (Rp)</th>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="text" name="materiallain" value="{{$lainlain->material}}"></td>
                                <td><input class="form-control" type="number" name="justifikasilain" value="{{$lainlain->justifikasipemakaian}}"></td>
                                <td><input class="form-control" type="number" name="kuantitaslain" value="{{$lainlain->kuantitas}}"></td>
                                <td><input class="form-control" type="number" name="hargalain" id="harga" value="{{$lainlain->hargasatuan}}"></td>  
                            </tr>
                        </tbody>
                    </table>
                </div>

               <!-- tinggal include addmore nya -->

                <div class="form-group mt-4">
                    <label for="susunanorganisasi">Susunan Organisasi</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama/NIM</th>
                                <th>Program Studi</th>
                                <th>Bidang Ilmu</th>
                                <th>Alokasi Waktu (jam/minggu)</th>
                                <th>Uraian Tugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach($users as $user)
                                @if(Auth::user()->nim == $user->nim)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$user->name}}/{{$user->nim}}</td>
                                        <td>{{$user->jurusan}}</td>
                                        <td>{{$user->bidangilmu}}</td>
                                        <td><input type="text" name="alokasiwaktu" class="form-control" placeholder="Alokasi Waktu (Jam/Minggu)" value="{{$user->alokasiwaktu}}"></td>
                                        <td><input type="text" name="uraiantugas" class="form-control" placeholder="Uraian Tugas" value="{{$user->uraiantugas}}"></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$user->name}}/{{$user->nim}}</td>
                                        <td>{{$user->jurusan}}</td>
                                        <td>{{$user->bidangilmu}}</td>
                                        <td>{{$user->alokasiwaktu}}</td>
                                        <td>{{$user->uraiantugas}}</td>
                                    </tr>
                                @endif
                                <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                

                <div class="row">
                    <div class="col-4">&nbsp;</div>
                    <div class="col-8 mt-4">
                        <button class="btn btn-primary far fa-save" type="submit">&nbsp;&nbsp;Save</button>
                        
                        <a href="{{url('/pkmksend', $items->id)}}" class="btn btn-secondary text-light far fa-share-square" onclick="return confirm('Are you sure want to send this item to lecturer?');">&nbsp;&nbsp;Send to Dosen</a>
                        
                        <a href="{{url('/pkmkgenerate' ,$items->id)}}" class="btn btn-success text-light fa-cloud-download-alt">&nbsp;&nbsp;Export</a>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>
    
    <script>
        tinymce.init({
                selector:'textarea.pendahuluan, textarea.gagasan, textarea.kesimpulan, textarea.daftarpustaka',
                plugins: "lists, advlist, hr, image",

                setup: function(ed) {
                    ed.on('keydown', function(event) {
                        if (event.keyCode == 9) { 
                            if (event.shiftKey) {
                                ed.execCommand('Outdent');
                            }
                            else {
                                ed.execCommand('Indent');
                            }

                            event.preventDefault();
                            return false;
                        }
                    });
                }
        });
    </script>
   
@endsection