@extends('layouts.dosen')

@section('content')
<div class="container">
    <div class="card">
        <div class="ml-2 mt-2">
            <h5>{{$pkm->title}}</h5>
            <p>{{$pkm->type}}</p>
            <p class="mt-2">Lecturer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{Auth::user()->name}}</p> 
            @foreach($users as $user)
                <p>Member &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$user->name}}</p>
            @endforeach
        </div>
        <div class="ml-2 mt-2 mb-2">
            <a href="{{url('/dosen')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
   
@endsection