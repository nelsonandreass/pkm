@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-2">
                <h4>Comment</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table table-striped">
                    <thead>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Time</th>
                    </thead>
                    @forelse($comments as $comment)
                    <tr>
                        <td>{{$pkm->title}}</td>
                        <td>{{$pkm->status}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->created_at}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"class="text-center">No Comment Yet</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    
   
   
@endsection