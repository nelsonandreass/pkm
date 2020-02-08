@extends('layouts.dosen')

@section('content')

<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-4"></div>
                <div class="col-4">
                    <img src="/binus.png" width="100%" alt="">
                    <p class="text-center"><b>PROGRAM KREATIVITAS MAHASISWA</b></p>
                </div>
            </div>
            <span class="text-center"><b>{{$pkm->title}}</b></span>
            <p class="text-center"><b>BIDANG KEGIATAN :</b></p>
            <p class="text-center" name="type">{{$pkm->type}}</p>
            <p class="text-center">Diusulkan oleh :</p>
            <table width="100%">
                @foreach($users as $user)
                    <tr class="text-center">
                        <td width="33%">{{$user->name}}</td>
                        <td width="33%">{{$user->nim}}</td>
                        <td width="33%"><?php echo date("Y"); ?></td>
                    </tr>
                @endforeach
            </table>
            <p class="text-center">  
            <br><br><br><br> 
            <b>UNIVERSITAS BINA NUSANTARA</b>
                        <br>
                    <b>JAKARTA</b>
                        <br>
            <b><?php echo date("Y"); ?></b>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-9">
                    <div class="pendahuluan ml-4">
                        <h5><b>Bab 1. Pendahuluan</b></h5>
                        <p>{!! $pkm-> pendahuluan !!}</p>
                    </div>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-9">
                    <div class="tinjauan ml-4">
                        <h5><b>Bab 2. Gagasan</b></h5>
                        <p>{!! $pkm-> gagasan !!}</p>
                     </div>
                </div>     
            </div>
            <br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-9">
                    <div class="metode ml-4">
                        <h5><b>Bab 3. Kesimpulan</b></h5>
                        <p>{!! $pkm->kesimpulan !!}</p>
                    </div>
                </div>     
            </div>
            <br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
                    <div class="metode ml-4">
                        <h5><b>Daftar Pustaka</b></h5>
                        <p>{!! $pkm->daftarpustaka !!}</p>
                    </div>
                </div>     
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-4 ml-3">
            <form action="{{url('/dosen/comment')}}" class="form-group" method="POST">
                @csrf
                <input type="hidden" name="pkmid" value="{{$pkm->id}}">
                <input type="hidden" name="type" value="{{$pkm->type}}">
                <textarea name="comment" class="w-100 form-control" id="" rows="5"></textarea>
                <button class="btn btn-primary mt-2 ">Save Comment</button>
            </form>

            <form action="{{url('/dosen/approve')}}" method="POST">
                @csrf
                <input type="hidden" name="pkmid" value="{{$pkm->id}}">
                <button class="btn btn-success">Approve</button>
            </form>
        </div>
    </div>
</div>
    

@endsection