@extends('layouts.app')

@section('content')

    <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        <div class="card"> 
            <div class="row ml-3 mt-3">
                
                Lecturer    &nbsp : {{optional($dosen)->name}}
                <br>
                @foreach($datas as $data)
                    @if($data->groupid == NULL)
                        <span>Anda belum terdaftar <a href="{{url('/registergroup')}}">Silahkan Mendaftar disini</a></span>
                        
                        @break
                    @else
                        <br>
                        Member &nbsp : {{$data->name}}
                        <br>
                    @endif
                    
                @endforeach
            </div>

    
            @if($pkms || $pkmk)
               
                <?php $i = 0 ?>
                <table class="table table-hover col-10 ml-3 mt-3">
                    <thead>
                        <th>NO</th>
                        <th width="30%">Judul Proposal</th>
                        <th>Jenis Proposal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>  
                    <tbody>
                        @foreach($pkms as $pkm)
                        <?php ++$i ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$pkm->title}}</td>
                            <td>{{$pkm->type}}</td>
                            <td>{{$pkm->status}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <form action="{{url('/edit')}}">
                                            <input type="hidden" value="{{$pkm->id}}" name="id">
                                            <button class="btn btn-primary far fa-edit">&nbsp;Edit</button>
                                        </form>
                                    </div>
                                    <div class="col-4 mr-1">
                                        <form action="{{url('/comment')}}">
                                            <input type="hidden" value="{{$pkm->id}}" name="id">
                                            <input type="hidden" value="{{$pkm->type}}" name="type">
                                            <button class="btn btn-secondary far fa-comment">&nbsp;Comment</button>
                                        </form>
                                    </div>
                                    <div class="col-3 ml-1">
                                        <form action="{{url('/delete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$pkm->id}}" name="id">
                                            <button class="btn btn-danger far fa-trash-alt" onclick="return confirm('Are you sure want to delete this item?');">&nbsp;Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @foreach($pkmk as $pkmk)
                        <?php ++$i ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td width="30%">{{$pkmk->title}}</td>
                            <td>{{$pkmk->type}}</td>
                            <td>{{$pkmk->status}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <form action="{{url('/pkmkedit')}}">
                                            <input type="hidden" value="{{$pkmk->id}}" name="idpkmk">
                                            <button class="btn btn-primary far fa-edit">&nbsp;Edit</button>
                                        </form>
                                    </div>
                                    <div class="col-4 mr-1">
                                        <form action="{{url('/comment')}}">
                                            <input type="hidden" value="{{$pkmk->id}}" name="idpkmk">
                                            <input type="hidden" value="{{$pkmk->type}}" name="type">
                                            <button class="btn btn-secondary far fa-comment">&nbsp;Comment</button>
                                        </form>
                                    </div>
                                    <div class="col-3 ml-1">
                                        <form action="{{url('/pkmkdelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$pkmk->id}}" name="idpkmk">
                                            <button class="btn btn-danger far fa-trash-alt" onclick="return confirm('Are you sure want to delete this item?');">&nbsp;Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>   
                        </tr>
                        @endforeach
                    </tbody> 
                </table>

                <div id="create" class="row ml-3 mt-3 mb-3">
                    <div class="col-6">
                        <button class="btn btn-primary" onclick="showDiv()">Create New Proposal</button>        
                    </div>
                </div>
                
                <div id="new" style="display: none;">
                    <form action="{{url('pkm')}}" class="form-group ">
                        <label for="pkm" class="mt-5 ml-3">PKM Type</label>
                        <select name="pkm" id="" class="form-control col-5 mt-1 ml-3">
                            <option value="">Choose type</option>
                            <option value="PKM-AI">PKM-AI</option>
                            <option value="PKM-GT">PKM-GT</option>
                            <option value="PKM-KC">PKM-KC</option>
                            <option value="PKM-K">PKM-K</option>
                        </select>
                        <button class="btn btn-primary mt-3 ml-3 mb-4">Submit</button>
                    </form>
                </div>
                
            @endif
            
            <br>
        </div>
    </div>

    <script>
        function showDiv() {
            document.getElementById('new').style.display = "block";
            document.getElementById('create').style.display = "none";
        }
    </script>
    
@endsection
