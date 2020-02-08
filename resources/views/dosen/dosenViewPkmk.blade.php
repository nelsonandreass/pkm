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
            <span class="text-center">{{$pkmk->title}}</span>
            <p class="text-center"><b>BIDANG KEGIATAN :</b></p>
            <p class="text-center" name="type">{{$pkmk->type}}</p>
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
                <div class="col-8">
                    <div class="pendahuluan ml-4">
                        <h5><b>Bab 1. Pendahuluan</b></h3>
                        <p>{!! $pkmk-> pendahuluan !!}</p>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
                    <div class="tinjauan ml-4">
                        <h5><b>Bab 2. Tinajuan Pustaka</b></h3>
                        <p>{!! $pkmk-> tinjauanpustaka !!}</p>
                     </div>
                </div>     
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
                    <div class="metode ml-4">
                        <h5><b>Bab 3. Metode Pelaksanaan</b></h3>
                        <p>{!! $pkmk->metodepelaksanaan !!}</p>
                    </div>
                </div>     
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
                    <div class="metode ml-4">
                        <h5><b>Daftar Pustaka</b></h3>
                        <p>{!! $pkmk->daftarpustaka !!}</p>
                    </div>
                </div>     
            </div>

            <div class="row">
            
            </div>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col-4 ml-3">
            <form action="{{url('/dosen/comment')}}" class="form-group" method="POST">
                @csrf
                <input type="hidden" name="pkmid" value="{{$pkmk->id}}">
                <input type="hidden" name="type" value="{{$pkmk->type}}">
                <textarea name="comment" class="w-100 form-control" id="" rows="5"></textarea>
                <button class="btn btn-primary mt-2 ">Save Comment</button>
            </form>
            <form action="{{url('/dosen/approve')}}" method="POST">
                @csrf
                <input type="hidden" name="pkmid" value="{{$pkmk->id}}">
                <button class="btn btn-success">Approve</button>
            </form>
        </div>
    </div>
</div>
    

@endsection