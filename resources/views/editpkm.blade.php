@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="row">
            <div class="col-1"></div>
            <div class="alert alert-success col-10">
                {{ session('status') }}
        </div>
        </div>
    @endif
    <div class="row">
        <div class="col-1"></div>
        <div class="card col-10 " id="card">
            <form action="{{url('/update')}}" method="POST" class="form-group mt-2">
                @csrf
                <input type="hidden" value="{{$items->id}}" name="id">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 ">
                        <img class="gambar" src="/binus.png" width="100%" alt="">
                        <p class="text-center"><b>PROGRAM KREATIVITAS MAHASISWA</b></p>
                    </div>
                </div>

                
                <div class="form-group centered">
                    <input id="input" type="text" name="judul" class="form-control" placeholder="Judul" value="{{$items->title}}">
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
                    <label for="gagasan">Gagasan</label>
                    <textarea name="gagasan" id="" rows="10" class="gagasan w-100 form-control">{{$items->gagasan}}</textarea>
                </div>

                <div class="form-group">
                    <label for="kesimpulan">Kesimpulan</label>
                    <textarea name="kesimpulan" id="" rows="10" class="kesimpulan w-100 form-control">{{$items->kesimpulan}}</textarea>
                </div>

                <div class="form-group">
                    <label for="daftarpustaka">Daftar Pustaka</label>
                    <textarea name="daftarpustaka" id="" rows="10" class="daftarpustaka w-100 form-control">{{$items->daftarpustaka}}</textarea>
                </div>

                <div class="form-group">
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
                                        <td><input  type="text" name="alokasiwaktu" class="form-control" placeholder="Alokasi Waktu (Jam/Minggu)" value="{{$user->alokasiwaktu}}"></td>
                                        <td><input  type="text" name="uraiantugas" class="form-control" placeholder="Uraian Tugas" value="{{$user->uraiantugas}}"></td>
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
                        <button class="btn btn-primary far fa-save">&nbsp;&nbsp;Save</button>
                        
                        <a href="{{url('send' , $items->id)}}" class="btn btn-secondary text-light far fa-share-square" onclick="return confirm('Are you sure want to send this item to lecturer?');">&nbsp;&nbsp;Send to Lecturer</a>

                        <a href="{{url('generate' ,$items->id)}}" class="btn btn-success text-light fas fa-cloud-download-alt">&nbsp;&nbsp;Export</a>
                    </div>
                </div>
                
                
            </form>
        </div>
        <!-- <div class="col-1">
            <label class="switch">
                <input type="checkbox" id="slide" onclick="dark()">
                <span class="slider round"></span>
                <p class="mt-3">Dark</p>
            </label>
        </div> -->
    </div>
</div>

    <script type="text/javascript">
        tinymce.init({
            selector:'textarea',
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

    <script type="text/javascript">
        function dark(){
            var card = document.getElementById('card');
            var body = document.getElementById('body');
            var nav = document.getElementById('nav');
            var input = document.getElementById('input');
            if(document.getElementById("slide").checked == true){
                body.classList.add('dark-mode');
                card.classList.add('proposal');
                nav.classList.remove('bg-white');
                nav.classList.add('dark-mode');
                input.classList.add('proposal');
            }
            else{
                body.classList.remove('dark-mode');
                card.classList.remove('proposal');
                nav.classList.add('bg-white');
                nav.classList.remove('dark-mode');
                input.classList.remove('proposal');
            }
        }
        
    </script>
@endsection