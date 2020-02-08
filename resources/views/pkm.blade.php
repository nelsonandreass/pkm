@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-1">&nbsp;</div>
    <div class="card col-10 ">
        <form action="{{url('/store')}}" method="POST" class="form-group mt-2">
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
                <label for="gagasan">Gagasan</label>
                <textarea name="gagasan" id="" rows="10" class="gagasan w-100 form-control"></textarea>
            </div>
            
            <div class="form-group">
                <label for="kesimpulan">Kesimpulan</label>
                <textarea name="kesimpulan" id="" rows="10" class="kesimpulan w-100 form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="daftarpustaka">Daftar Pustaka</label>
                <textarea name="daftarpustaka" id="" rows="10" class="daftarpustaka w-100 form-control"></textarea>
            </div>
            
            <button class="btn btn-primary far fa-save">&nbsp;&nbsp;Save</button>
            
        </form>
    </div>
    <div class="col-1"></div>
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
