@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-1">&nbsp;</div>
    <div class="card col-10">
        <form action="{{url('/pkmkstore')}}" method="POST" class="form-group mt-2">
            @csrf
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 ">
                    <img src="binus.png" width="100%" alt="">
                    <p class="text-center"><b>PROGRAM KREATIVITAS MAHASISWA</b></p>
                </div>
            </div>

            <div class="form-group">
                <input type="text" name="judul" class="form-control" placeholder="Judul">
            </div>
            
            <p class="text-center"><b>BIDANG KEGIATAN :</b></p>
            <p class="text-center" name="type">{{$type}}</p>
            <input type="text" style="visibility: hidden" value="{!! $type !!}" name="type">
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
                <div class="col-4"></div>
                <div class="col-4 text-center" >
                    <b>UNIVERSITAS BINA NUSANTARA</b>
                            <br>
                            <b>JAKARTA</b>
                            <br>
                            <b><?php echo date("Y"); ?></b>
                    
                </div>
            </div>
           

            <div class="form-group">
                <label for="pendahuluan">Pendahuluan</label>
                <textarea name="pendahuluan" id="" rows="10" class="pendahuluan w-100 form-control"></textarea>
            </div>
            
            <div class="form-group">
                <label for="tinjauanpustaka">Tinjauan Pustaka</label>
                <textarea name="tinjauanpustaka" id="" rows="10" class="tinjauan w-100 form-control"></textarea>
            </div>
            
            <div class="form-group">
                <label for="metodepelaksanaan">Metode Pelaksanaan</label>
                <textarea name="metodepelaksanaan" id="" rows="10" class="metodepelaksanaan w-100 form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="daftarpustaka">Daftar Pustaka</label>
                <textarea name="daftarpustaka" id="" rows="10" class="daftarpustaka w-100 form-control"></textarea>
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
                                <td><input class="form-control" type="text" name="materialpenunjang"></td>
                                <td><input class="form-control" type="number" name="justifikasipenunjang"></td>
                                <td><input class="form-control" type="number" name="kuantitaspenunjang" id="kuantitaspenunjang"></td>
                                <td><input class="form-control" type="number" name="hargapenunjang" id="hargapenunjang"></td>  
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
                                <td><input class="form-control" type="text" name="materialhabispakai"></td>
                                <td><input class="form-control" type="number" name="justifikasihabispakai"></td>
                                <td><input class="form-control" type="number" name="kuantitashabispakai" id="kuantitaspenunjang"></td>
                                <td><input class="form-control" type="number" name="hargahabispakai" id="hargapenunjang"></td>  
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
                                <td><input class="form-control" type="text" name="materialperjalanan"></td>
                                <td><input class="form-control" type="number" name="justifikasiperjalanan"></td>
                                <td><input class="form-control" type="number" name="kuantitasperjalanan" id="kuantitaspenunjang"></td>
                                <td><input class="form-control" type="number" name="hargaperjalanan" id="hargapenunjang"></td>  
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
                                <td><input class="form-control" type="text" name="materiallain"></td>
                                <td><input class="form-control" type="number" name="justifikasilain"></td>
                                <td><input class="form-control" type="number" name="kuantitaslain" id="kuantitaspenunjang"></td>
                                <td><input class="form-control" type="number" name="hargalain" id="hargapenunjang"></td>  
                            </tr>
                        </tbody>
                    </table>
            </div>

                

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
                
            
            <button class="btn btn-primary far fa-save">&nbsp;&nbsp;Save</button>
            
        </form>
    </div>
    <div class="col-1"></div>
</div>
    
</div>
    <script>
        tinymce.init({
                selector:'textarea.pendahuluan, textarea.tinjauan, textarea.metodepelaksanaan, textarea.daftarpustaka',
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
