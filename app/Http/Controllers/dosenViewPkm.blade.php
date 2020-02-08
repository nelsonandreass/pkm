@extends('layouts.app')

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
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-1"></div>
        <div class="col-4">
        
            <form action="{{url('/dosen/comment')}}" class="form-group" method="POST">
                @csrf
                <input type="hidden" name="pkmid" value="{{$pkm->id}}">
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