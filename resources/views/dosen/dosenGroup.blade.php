@extends('layouts.dosen')

@section('content')

    <div class="container">
        <div class="col-4">
            <div class="card">
                <div class="card-header text-center">
                Group
                </div>
                <div class="card-body text-center">
                    {{$group}}
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-header text-center">
                Not Yet Approved
            </div>
            <div class="card-body text-center">
                {{$notyet}}
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    
@endsection