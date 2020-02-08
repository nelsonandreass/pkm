@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card">
        <form action="{{url('/sendfeedback')}}" method="POST" class="m-3">
            @csrf 
            <h3>Send us your feedback</h3>
            <label for="nim" class="mt-2">NIM</label>
            @if(Auth::guest())
                <input type="text" class="form-control" name="nim">
            @else
                <input type="text" class="form-control" name="nim" value="{{Auth::user()->nim}}" disabled>
            @endif
            <label class="mt-3" for="">Feedback</label>
            <textarea class="form-control" name="feedback" id="" cols="30" rows="10"></textarea>
            <button class="btn btn-primary mt-3">Submit</button>
        </form>

    </div>

</div>
@endsection
