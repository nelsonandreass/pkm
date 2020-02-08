@extends('layouts.dosen')

@section('content')
  
    <div class="row mt-4">   
        <div class="col-12">
        <?php $i = 0 ?>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Action</th>  
            </thead>
            <tbody>
                @foreach($pkmgt as $pkm)    
                    @foreach($pkm->pkms as $data)
                        @if($data->type == 'PKM-Gagasan Tertulis' && $data->status == 'Waiting to be Reviewed')
                            <tr>   
                                <?php ++$i ?>
                                <td>{{$i}}</td>
                                <td width="50%">{{$data->title}}&nbsp;({{$data->type}})</td>
                                <td>{{$data->status}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <form action="{{url('/dosen/view')}}">
                                                <input type="hidden" value="{{$data->id}}" name="pkm">
                                                <button class="btn btn-success far fa-eye">&nbsp;&nbsp;View</button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{url('/dosen/detailpkm')}}">
                                                <input type="hidden" value="{{$data->id}}" name="pkm">
                                                <button class="btn btn-secondary fas fa-info-circle">&nbsp;&nbsp;Detail</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @elseif($data->type == 'PKM-Artikel Ilmiah' && $data->status == 'Waiting to be Reviewed')
                            <tr>   
                                <?php ++$i ?>
                                <td>{{$i}}</td>
                                <td width="50%">{{$data->title}}&nbsp;({{$data->type}})</td>
                                <td>{{$data->status}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <form action="{{url('/dosen/view')}}">
                                                <input type="hidden" value="{{$data->id}}" name="pkm">
                                                <button class="btn btn-success far fa-eye">&nbsp;&nbsp;View</button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{url('/dosen/detailpkm')}}">
                                                <input type="hidden" value="{{$data->id}}" name="pkm">
                                                <button class="btn btn-secondary fas fa-info-circle">&nbsp;&nbsp;Detail</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
                @foreach($pkmk as $pkmk)
                    @foreach($pkmk->pkmks as $datapkmk)
                        @if($datapkmk->type == 'PKM-Karsa Cipta' && $datapkmk->status ==  'Waiting to be Reviewed')
                            <tr>   
                                <?php ++$i ?>
                                <td>{{$i}}</td>
                                <td width="50%">{{$datapkmk->title}}&nbsp;({{$datapkmk->type}})</td>
                                <td>{{$datapkmk->status}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <form action="{{url('/dosen/viewpkmk')}}">
                                                <input type="hidden" value="{{$datapkmk->id}}" name="pkmk">
                                                <button class="btn btn-success far fa-eye">&nbsp;&nbsp;View</button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{url('/dosen/detailpkmk')}}">
                                                <input type="hidden" value="{{$datapkmk->id}}" name="pkmk">
                                                <button class="btn btn-secondary fas fa-info-circle">&nbsp;&nbsp;Detail</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @elseif($datapkmk->type == 'PKM-Kewirausahaan' && $datapkmk->status ==  'Waiting to be Reviewed')
                            <tr>   
                                <?php ++$i ?>
                                <td>{{$i}}</td>
                                <td width="50%">{{$datapkmk->title}}&nbsp;({{$datapkmk->type}})</td>
                                <td>{{$datapkmk->status}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <form action="{{url('/dosen/viewpkmk')}}">
                                                <input type="hidden" value="{{$datapkmk->id}}" name="pkmk">
                                                <button class="btn btn-success far fa-eye">&nbsp;&nbsp;View</button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{url('/dosen/detailpkmk')}}">
                                                <input type="hidden" value="{{$datapkmk->id}}" name="pkmk">
                                                <button class="btn btn-secondary fas fa-info-circle">&nbsp;&nbsp;Detail</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
           
        </div>
    </div>
@endsection