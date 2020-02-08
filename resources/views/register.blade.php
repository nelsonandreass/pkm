@extends('layouts.app')

@section('content')

       
<div class="container">
    <div class="card">
        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{url('regist')}}" method="POST" class="mt-2">
            @csrf
            <div class="row mt-2 ml-3 mb-3">
                <div class="col-5">

                        <label for="Dosen">Dosen</label>
                        <select name="dosen" id="" class="form-control">
                            <option value="">Pilih Kode Dosen</option>
                            @foreach($datas as $data)
                                <option value="{{$data->nim}}">
                                    {{$data->name}}
                                </option>
                            @endforeach
                        </select>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="">Ketua</label>
                            </div>
                            <div class="col-6">
                                <p>{{$user->name}}</p>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="nim">NIM <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="member1">
                            </div>
                            <div class="col-6">
                                <label for="password">Password <span style="color:red;">*</span></label>
                                <input type="password" class="form-control" name="password1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="nim">NIM <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="member2">
                            </div>
                            <div class="col-6">
                                <label for="password">Password <span style="color:red;">*</span></label>
                                <input type="password" class="form-control" name="password2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" name="member3">
                            </div>
                            <div class="col-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" name="member4">
                            </div>
                            <div class="col-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password4">
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6"><button class="btn btn-primary mt-5 ml-3 mb-3" type="submit">Register</button></div>
            </div>
            
        </form>
    </div>
</div>
@endsection
