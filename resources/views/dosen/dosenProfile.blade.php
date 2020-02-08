@extends('layouts.dosen')

@section('content')

    <div class="container">
        <div class="card">
            <form action="{{url('/dosen/profileupdate')}}" class="mt-3" method="POST">
                @csrf
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h3 class="text-center mt-5">Profile</h3>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" value="{{$auth->name}}" class="form-control " readonly>
                        </div>  

                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" id="" class="form-control">
                                <option value="">Choose</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>  

                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" value="{{$auth->jurusan}}">
                        </div>
                     
                        <div class="form-group">
                            <label for="kodedosen">Kode Dosen</label>
                            <input type="text" value="{{$auth->nim}}" class="form-control " readonly>  
                        </div>
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" name="nidn" class="form-control" value="{{$auth->nidn}}">
                        </div>

                        <div class="form-group">
                            <label for="tempat">Tempat Lahir</label>
                            <input type="text" name="tempat" class="form-control" value="{{$auth->tempatlahir}}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal Lahir</label>
                            <input type="date" name="tanggal" class="form-control " value="{{$auth->tanggallahir}}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" class="form-control" value="{{$auth->email}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="handphone">Nomor Handphone</label>
                            <input type="text" class="form-control " name="handphone" value="{{$auth->nomortelepon}}">  
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$auth->alamat}}">  
                        </div>

                        <h3 class="text-center mt-5">Riwayat Pendidikan</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th class="text-center"><b>S1</b></th>
                                    <th class="text-center"><b>S2</b></th>
                                    <th class="text-center"><b>S3</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama Instansi</td>
                                    <td><input type="text" class="form-control" name="s1" value="{{optional($pendidikan)->s1}}"></td>
                                    <td><input type="text" class="form-control" name="s2" value="{{optional($pendidikan)->s2}}"></td>
                                    <td><input type="text" class="form-control" name="s3" value="{{optional($pendidikan)->s3}}"></td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td><input type="text" class="form-control" name="jurusans1" value="{{optional($pendidikan)->jurusans1}}"></td>
                                    <td><input type="text" class="form-control" name="jurusans2" value="{{optional($pendidikan)->jurusans2}}"></td>
                                    <td><input type="text" class="form-control" name="jurusans3" value="{{optional($pendidikan)->jurusans3}}"></td>
                                </tr>
                                <tr>
                                    <td>Tahun Masuk - Lulus</td>
                                    <td><input type="text" class="form-control" name="tahuns1" value="{{optional($pendidikan)->tahuns1}}"></td>
                                    <td><input type="text" class="form-control" name="tahuns2" value="{{optional($pendidikan)->tahuns2}}"></td>
                                    <td><input type="text" class="form-control" name="tahuns3" value="{{optional($pendidikan)->tahuns3}}"></td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="text-center mt-5">Pemakalah Seminar Ilmiah (Oral Presentation)</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pertemuan Ilmiah / Seminar</th>
                                    <th>Judul Artikel Ilmiah</th>
                                    <th>Waktu dan Tempat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($checkseminar)
                                    @foreach($seminars as $seminar)
                                        <tr>
                                            <td>1.</td>
                                            <td><input type="text" class="form-control" name="namaseminar1" value="{{optional($seminar)->namaseminar1}}"></td>
                                            <td><input type="text" class="form-control" name="judulseminar1" value="{{optional($seminar)->judulseminar1}}"></td>
                                            <td><input type="text" class="form-control" name="waktu1" value="{{optional($seminar)->waktu1}}"></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td><input type="text" class="form-control" name="namaseminar2" value="{{optional($seminar)->namaseminar2}}"></td>
                                            <td><input type="text" class="form-control" name="judulseminar2" value="{{optional($seminar)->judulseminar2}}"></td>
                                            <td><input type="text" class="form-control" name="waktu2" value="{{optional($seminar)->waktu2}}"></td>
                                        </tr>
                                    @endforeach
                                @else   
                                    <tr>
                                        <td>1.</td>
                                        <td><input type="text" class="form-control" name="namaseminar1"></td>
                                        <td><input type="text" class="form-control" name="judulseminar1"></td>
                                        <td><input type="text" class="form-control" name="waktu1"></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td><input type="text" class="form-control" name="namaseminar2"></td>
                                        <td><input type="text" class="form-control" name="judulseminar2"></td>
                                        <td><input type="text" class="form-control" name="waktu2"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <h3 class="text-center mt-5">Penghargaan dalam 10 tahun Terakhir (dari pemerintah, asosiasi atau
institusi lainnya)</h3>
                        <table class="table">
                            <thead>
                                <th>No.</th>
                                <th>Jenis Penghargaan</th>
                                <th>Institusi Pemberi Penghargaan</th>
                                <th>Tahun</th>
                            </thead>
                            <tbody>
                                @if($checkpenghargaan)
                                    @foreach($penghargaans as $penghargaan)
                                    <tr>
                                        <td>1.</td>
                                        <td><input type="text" class="form-control" name="jenispenghargaan1" value="{{optional($penghargaan)->jenispenghargaan1}}"></td>
                                        <td><input type="text" class="form-control" name="institusi1" value="{{optional($penghargaan)->institusi1}}"></td>
                                        <td><input type="text" class="form-control" name="tahun1" value="{{optional($penghargaan)->tahun1}}"></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td><input type="text" class="form-control" name="jenispenghargaan2" value="{{optional($penghargaan)->jenispenghargaan2}}"></td>
                                        <td><input type="text" class="form-control" name="institusi2" value="{{optional($penghargaan)->institusi2}}"></td>
                                        <td><input type="text" class="form-control" name="tahun2 " value="{{optional($penghargaan)->tahun2}}"></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>1.</td>
                                        <td><input type="text" class="form-control" name="jenispenghargaan1"></td>
                                        <td><input type="text" class="form-control" name="institusi1"></td>
                                        <td><input type="text" class="form-control" name="tahun1"></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td><input type="text" class="form-control" name="jenispenghargaan2"></td>
                                        <td><input type="text" class="form-control" name="institusi2"></td>
                                        <td><input type="text" class="form-control" name="tahun2"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2"><button class="btn btn-primary">Simpan</button></div>

                </div>
                
            </form>
        </div>
    </div>

    

@endsection
