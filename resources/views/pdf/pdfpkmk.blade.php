<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('bootstrap.min.css')}}">
    <style>
            .grid-1 {width: 8.33%;}
            .grid-2 {width: 16.66%;}
            .grid-3 {width: 25%;}
            .grid-4 {width: 33.33%;}
            .grid-5 {width: 41.66%;}
            .grid-6 {width: 50%;}
            .grid-7 {width: 58.33%;}
            .grid-8 {width: 66.66%;}
            .grid-9 {width: 75%;}
            .grid-10 {width: 83.33%;}
            .grid-11 {width: 91.66%;}
            .grid-12 {width: 100%;}

            [class*="grid-"] {
                float: left;
            }
            .text-center{
                text-align: center;
            }
            .page-break {
                page-break-after: always;
            }
            .pendahuluan,.gagasan,.kesimpulan{
                text-align: justify;
            } 
            body{
                padding: 0;
                font-family: "Times New Roman";
                font-size: 12;
                margin-left: 3cm;
                margin-top: 1.5cm;
                margin-right: 1.5cm;
                margin-bottom: 1.5cm;
            }
            .lembarpengesahan{
                margin: 0;
                line-height: 1.15;
                padding: 0;
            }
            .identitas {
                border: 1px solid black;
                padding-left: 10px;
            }
            .datadiri{
                margin: -20px !important;
            }
            .datadosen{
                margin: -20px !important;
            }
    </style>

    <?php $pendahuluan = 0?>

    <div class="sampul">
        <div class="grid-1"></div>
        <div class="grid-10"> 
            <img src="{{public_path('binus.png')}}" width="233px" style="margin-left:70px;" alt="logo">
            
            <p class="text-center"><b>PROGRAM KREATIVITAS MAHASISWA</b></p>
            <p class="text-center">{{$items->title}}</p>
            <p class="text-center"><b>BIDANG KEGIATAN :</b></p>
            <p class="text-center" name="type"><b>{{$items->type}}</b></p>
            <br><br>
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
            </p>
    </div>
    
    <div class="page-break"></div>

    <div class="lembarpengesahan">
        <p class="text-center"><b>PENGESAHAN {{$items->type}}</b></p>
        <table width="100%">
            <tr>
                <td width="5%" valign="top"> 1</td>
                <td width="45%" valign="top">Judul Kegiatan</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$items->title}}</td>
            </tr>
            <tr>
                <td width="5%" valign="top"> 2</td>
                <td width="45%" valign="top">Bidang Kegiatan</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$items->type}}</td>
            </tr>
            <tr>
                <td width="5%" valign="top"> 3</td>
                <td width="45%" valign="top">Ketua Pelaksana Kegiatan</td>
                <td width="1%" valign="top"> </td>
                <td width="49%" valign="top"></td>
            </tr>
            <tr>
                <td width="5%" valign="top"> </td>
                <td width="45%" valign="top">a. Nama Lengkap</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$ketua->name}}</td>
            </tr>
            <tr>
                <td width="5%" valign="top"> </td>
                <td width="45%" valign="top">b. NIM</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$ketua->nim}}</td>
            </tr>
            <tr>
                <td width="5%" valign="top"> </td>
                <td width="45%" valign="top">c. Jurusan</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$ketua->jurusan}}</td>
            </tr>
            <tr>
                <td width="5%" valign="top"> </td>
                <td width="45%" valign="top">d. Univeritas</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">Universitas Bina Nusantara</td>
            </tr>
            <tr>
                <td width="5%" valign="top"> </td>
                <td width="45%" valign="top">e. Alamat Rumah dan No Tel./HP</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$ketua->alamat}}</td>
            </tr>
            <tr>
                <td width="5%" valign="top"> </td>
                <td width="45%" valign="top">f. Alamat email</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$ketua->email}}</td>
            </tr>
            <tr>
                <td width="5%" valign="top">4</td>
                <td width="45%" valign="top">Anggota Pelaksana Kegiatan/Penulisan</td>
                <td width="1%" valign="top"> :</td>
                <td width="49%" valign="top">{{$anggota}} orang</td>
            </tr>
            <tr>
                <td width="5%" valign="top">5</td>
                <td width="45%" valign="top">Dosen pendamping</td>
                <td width="1%" valign="top"></td>
                <td width="49%" valign="top"></td>
            </tr>
            <tr>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top">Nama Lengkap dan Gelar</td>
                <td width="1%" valign="top">:</td>
                <td width="49%" valign="top">
                        {{$dosens->name}}
                </td>
            </tr>
            <tr>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top">NIDN</td>
                <td width="1%" valign="top">:</td>
                <td width="49%" valign="top"></td>
            </tr>
            <tr>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top">Alamat Rumah dan No. Tel/HP</td>
                <td width="1%" valign="top">:</td>
                <td width="49%" valign="top">
                        {{$dosens->alamat}}
                </td>
            </tr>
            
            <tr>
                <td width="5%" valign="top">6.</td>
                <td width="45%" valign="top">Biaya Kegiatan Total</td>
                <td width="1%" valign="top">:</td>
                <td width="49%" valign="top"></td>
            </tr>
            <!-- biaya -->
            <tr>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top">a. Kemenristekdikti</td>
                <td width="1%" valign="top">:</td>
                <td width="49%" valign="top">Rp. {{number_format(optional($lainlain)->kuantitas * optional($lainlain)->hargasatuan + optional($perjalanan)->kuantitas * optional($perjalanan)->hargasatuan + optional($habispakai)->kuantitas * optional($habispakai)->hargasatuan + optional($penunjang)->kuantitas * optional($penunjang)->hargasatuan,2,",",".") }}</td>
            </tr>

            <tr>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top">a. Sumber Lain</td>
                <td width="1%" valign="top">:</td>
                <td width="49%" valign="top"></td>
            </tr>
            

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top"></td>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top" align="center">Jakarta</td>
            </tr>

            <tr>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="top" align="center">Menyetujui,<br>Ketua Jurusan Computer Science</td>
                <td width="5%" valign="top"></td>
                <td width="45%" valign="bottom" align="center">Ketua Pelaksana Kegiatan</td>
            </tr>
            
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td align="center"><u>Fredy Purnomo, S.Kom., M.Kom</u></td>
                <td></td>
                <td align="center"><u>{{$ketua->name}}</u></td>
            </tr>

            <tr>
                <td></td>
                <td align="center">D1892</td>
                <td></td>
                <td align="center">{{$ketua->nim}}</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td width="1%" ></td>
                <td width="53%" valign="top" align="center">Wakil Rektor Bidang Kemahasiswaan dan Pengembangan Komunitas</td>
                <td width="1%" ></td>
                <td width="45%" valign="top" align="center">Dosen Pendamping</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp; </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td width="5%" ></td>
                <td width="45%" align="center"><u>Johan, S.Kom., M.M.</u></td>
                <td width="5%" ></td>
                <td width="45%" align="center"><u>{{$dosens->name}}</u></td>
            </tr>

            <tr>
                <td width="5%" ></td>
                <td width="45%" align="center">D1582</td>
                <td width="5%" ></td>
                <td width="45%" align="center">{{$dosens->nim}}</td>
            </tr>

        </table>
    </div>

   
</head>
<body>  
    <div class="page-break"></div>

    <div class="pendahuluan">
        <h5><b>BAB 1. Pendahuluan</b></h5>
        <p>{!! $items->pendahuluan !!}</p>
    </div>
    
    <div class="tinjauan">
        <br>
        <h5><b>BAB 2. Tinjauan Pustaka</b></h5>
        <p>{!! $items->tinjauanpustaka !!}</p>
    </div>
    
    <div class="metode">
        <br>
        <h5><b>BAB 3. Metode Pelaksanaan</b></h5>
        <p>{!! $items->metodepelaksanaan !!}</p>
    </div>
    
    <div class="page-break"></div>
    
    <div class="anggaran">
        <h5><b>BAB 4. Biaya dan Jadwal Kegiatan</b></h5>
        <span><b>4.1 Anggaran Biaya</b></span>
        <br>
        <span><b>Tabel 4.1 Format Ringkasan Anggaran Biaya {{$items->type}}</b></span>
        <table class="identitas" width="100%">
            <tr class="identitas">
                <td class="identitas">No.</td>
                <td class="identitas">Jenis Pengeluaran</td>
                <td class="identitas">Biaya (Rp)</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">1.</td>
                <td class="identitas">Peralatan penunjang: {{optional($penunjang)->material}}</td>
                <td class="identitas">Rp. {{number_format(optional($penunjang)->kuantitas * optional($penunjang)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">2.</td>
                <td class="identitas">Bahan Habis Pakai: {{optional($habispakai)->material}}</td>
                <td class="identitas">Rp. {{number_format(optional($habispakai)->kuantitas * optional($habispakai)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">3.</td>
                <td class="identitas">Perjalanan: {{optional($perjalanan)->material}}</td>
                <td class="identitas">Rp. {{number_format(optional($perjalanan)->kuantitas * optional($perjalanan)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">4.</td>
                <td class="identitas">Lain-lain: {{optional($lainlain)->material}}</td>
                <td class="identitas">Rp. {{number_format(optional($lainlain)->kuantitas * optional($lainlain)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas text-center" colspan="2">Jumlah</td>
                <td class="identitas">Rp. {{number_format(optional($lainlain)->kuantitas * optional($lainlain)->hargasatuan + optional($perjalanan)->kuantitas * optional($perjalanan)->hargasatuan + optional($habispakai)->kuantitas * optional($habispakai)->hargasatuan + optional($penunjang)->kuantitas * optional($penunjang)->hargasatuan,2,",",".") }}</td>
            </tr>
        </table>
    </div>

    <div class="page-break"></div>

    <div class="daftarpustaka">
        <h5><b>Daftar Pustaka</b></h5>
        <p>{!! $items->daftarpustaka !!}</p>
    </div>

    <div class="page-break"></div>

    <div class="datadiri">
        <b>Lampiran 1.  Biodata Ketua, Anggota, dan Dosen Pembimbing</b>
        <br>
        <?php $i = 1 ?>
        @foreach($identitas as $data)
            <b>{{$i}}. Biodata {{$data->susunanorganisasi}}</b>
            <br>
            <b> A. Identitas Diri</b>
            <br>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas" height="5px">1.</th>
                    <td class="identitas" height="5px">Nama Lengkap</td>
                    <td class="identitas" height="5px">{{$data->name}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">2.</th>
                    <td class="identitas" height="5px">Jenis Kelamin</td>
                    <td class="identitas" height="5px">{{$data->jeniskelamin}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">3.</th>
                    <td class="identitas" height="5px">Program Studi</td>
                    <td class="identitas" height="5px">{{$data->jurusan}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">4.</th>
                    <td class="identitas" height="5px">NIM</td>
                    <td class="identitas" height="5px">{{$data->nim}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">5.</th>
                    <td class="identitas" height="5px">Tempat dan Tanggal Lahir</td>
                    <td class="identitas" height="5px">{{$data->tempatlahir}}, {{$data->tanggallahir }}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">6.</th>
                    <td class="identitas" height="5px">E-mail</td>
                    <td class="identitas" height="5px">{{$data->email}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">7.</th>
                    <td class="identitas" height="5px">Nomor Telepon</td>
                    <td class="identitas" height="5px">{{$data->nomortelepon}}</td>
                </tr>
            </table>
            <b> B. Riwayat Pendidikan</b>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas">&nbsp;</td>
                    <td class="identitas"><b>SD</b></td>
                    <td class="identitas"><b>SMP</b></td>
                    <td class="identitas"><b>SMA</b></td>
                </tr>
                <tr class="identitas">
                    <td class="identitas">Nama Instansi</td>
                    <td class="identitas">{{$data->pendidikan['sd']}}</td>
                    <td class="identitas">{{$data->pendidikan['smp']}}</td>
                    <td class="identitas">{{$data->pendidikan['sma']}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas">Jurusan</td>
                    <td class="identitas">{{$data->pendidikan['jurusansd']}}</td>
                    <td class="identitas">{{$data->pendidikan['jurusansmp']}}</td>
                    <td class="identitas">{{$data->pendidikan['jurusansma']}}</td>
                </tr> 
                <tr class="identitas">
                    <td class="identitas">Tahun Masuk - Lulus</td>
                    <td class="identitas">{{$data->pendidikan['tahunsd']}}</td>
                    <td class="identitas">{{$data->pendidikan['tahunsmp']}}</td>
                    <td class="identitas">{{$data->pendidikan['tahunsma']}}</td>
                </tr>
            </table>

            <b> C. Pemakalah Seminar Ilmiah (Oral Presentation)</b>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas">No</td>
                    <td class="identitas">Nama Pertemuan Ilmian / Seminar</td>
                    <td class="identitas">Judul Artikel Ilmiah</td>
                    <td class="identitas">Waktu dan Tempat</td>
                </tr>
                @foreach($data->seminars as $seminar)
                    <tr class="identitas">
                        <td class="identitas">1.</td>
                        <td class="identitas">{{$seminar->namaseminar1}}</td>
                        <td class="identitas">{{$seminar->judulseminar1}}</td>
                        <td class="identitas">{{$seminar->waktu1}}</td>
                    </tr>
                    <tr class="identitas">
                        <td class="identitas">2.</td>
                        <td class="identitas">{{$seminar->namaseminar2}}</td>
                        <td class="identitas">{{$seminar->judulseminar2}}</td>
                        <td class="identitas">{{$seminar->waktu2}}</td>
                    </tr>
                @endforeach
            </table>

            <b>D. Penghargaan dalam 10 tahun Terakhir (dari pemerintah, asosiasi atau
        institusi lainnya)</b>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas">No</td>
                    <td class="identitas"><b>Jenis Penghargaan</b></td>
                    <td class="identitas"><b>Institusi Pemberi Penghargaan</b></td>
                    <td class="identitas"><b>Tahun</b></td>
                </tr>
                @foreach($data->penghargaans as $penghargaan)
                    <tr class="identitas">
                        <td class="identitas">1.</td>
                        <td class="identitas">{{$penghargaan->jenispenghargaan1}}</td>
                        <td class="identitas">{{$penghargaan->institusi1}}</td>
                        <td class="identitas">{{$penghargaan->tahun1}}</td>
                    </tr>
                    <tr class="identitas">
                        <td class="identitas">2.</td>
                        <td class="identitas">{{$penghargaan->jenispenghargaan2}}</td>
                        <td class="identitas">{{$penghargaan->institusi2}}</td>
                        <td class="identitas">{{$penghargaan->tahun2}}</td>
                    </tr>
                @endforeach
            </table>

            <p>Semua data yang saya isikan dan tercantum dalam biodata ini adalah benar dan
                dapat dipertanggungjawabkan secara hukum. Apabila di kemudian hari ternyata
                dijumpai ketidaksesuaian dengan kenyataan, saya sanggup menerima sanksi.
                Demikian biodata ini saya buat dengan sebenarnya untuk memenuhi salah satu
                persyaratan dalam pengajuan Hibah <b>{{$items->type}}</b></p>

                <table width="100%">
                    <tr>
                        <td width="100%">&nbsp;</td>
                        <td width="100%" class="text-center">Jakarta, <?php echo date("d/m/Y"); ?></td>
                    </tr>
                    <tr>
                        <td width="100%">&nbsp;</td>
                        <td width="100%" class="text-center">Pengusul,</td>
                    </tr>
                    <tr>
                        <td width="100%">&nbsp;</td>    
                        <td width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="100%">&nbsp;</td>
                        <td width="100%" class="text-center">{{$data->name}}</td>
                    </tr>
                </table>
                
            <?php $i++ ?>
            <div class="page-break"></div>
        @endforeach    

        <!-- data dosen -->
        <b>{{$i}}. Biodata Dosen Pembimbig</b>
            <br>
            <b> A. Identitas Diri</b>
            <br>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas" height="5px">1.</th>
                    <td class="identitas" height="5px">Nama Lengkap</td>
                    <td class="identitas" height="5px">{{$dosens->name}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">2.</th>
                    <td class="identitas" height="5px">Jenis Kelamin</td>
                    <td class="identitas" height="5px">{{$dosens->jeniskelamin}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">3.</th>
                    <td class="identitas" height="5px">Program Studi</td>
                    <td class="identitas" height="5px">{{$dosens->jurusan}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">4.</th>
                    <td class="identitas" height="5px">NIDN</td>
                    <td class="identitas" height="5px">{{$dosens->nidn}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">5.</th>
                    <td class="identitas" height="5px">Tempat dan Tanggal Lahir</td>
                    <td class="identitas" height="5px">{{$dosens->tempatlahir}}, {{$dosens->tanggallahir }}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">6.</th>
                    <td class="identitas" height="5px">E-mail</td>
                    <td class="identitas" height="5px">{{$dosens->email}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas" height="5px">7.</th>
                    <td class="identitas" height="5px">Nomor Telepon</td>
                    <td class="identitas" height="5px">{{$dosens->nomortelepon}}</td>
                </tr>
            </table>
            <b> B. Riwayat Pendidikan</b>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas">&nbsp;</td>
                    <td class="identitas"><b>S1</b></td>
                    <td class="identitas"><b>S2</b></td>
                    <td class="identitas"><b>S3</b></td>
                </tr>
                <tr class="identitas">
                    <td class="identitas">Nama Instansi</td>
                    <td class="identitas">{{$dosens->pendidikan['s1']}}</td>
                    <td class="identitas">{{$dosens->pendidikan['s2']}}</td>
                    <td class="identitas">{{$dosens->pendidikan['s3']}}</td>
                </tr>
                <tr class="identitas">
                    <td class="identitas">Jurusan</td>
                    <td class="identitas">{{$dosens->pendidikan['jurusans1']}}</td>
                    <td class="identitas">{{$dosens->pendidikan['jurusans2']}}</td>
                    <td class="identitas">{{$dosens->pendidikan['jurusans3']}}</td>
                </tr> 
                <tr class="identitas">
                    <td class="identitas">Tahun Masuk - Lulus</td>
                    <td class="identitas">{{$dosens->pendidikan['tahuns1']}}</td>
                    <td class="identitas">{{$dosens->pendidikan['tahuns2']}}</td>
                    <td class="identitas">{{$dosens->pendidikan['tahuns3']}}</td>
                </tr>
            </table>

            <b> C. Pemakalah Seminar Ilmiah (Oral Presentation)</b>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas">No</td>
                    <td class="identitas">Nama Pertemuan Ilmian / Seminar</td>
                    <td class="identitas">Judul Artikel Ilmiah</td>
                    <td class="identitas">Waktu dan Tempat</td>
                </tr>
                @foreach($dosens->seminars as $seminar)
                    <tr class="identitas">
                        <td class="identitas">1.</td>
                        <td class="identitas">{{$seminar->namaseminar1}}</td>
                        <td class="identitas">{{$seminar->judulseminar1}}</td>
                        <td class="identitas">{{$seminar->waktu1}}</td>
                    </tr>
                    <tr class="identitas">
                        <td class="identitas">2.</td>
                        <td class="identitas">{{$seminar->namaseminar2}}</td>
                        <td class="identitas">{{$seminar->judulseminar2}}</td>
                        <td class="identitas">{{$seminar->waktu2}}</td>
                    </tr>
                @endforeach
            </table>

            <b>D. Penghargaan dalam 10 tahun Terakhir (dari pemerintah, asosiasi atau
        institusi lainnya)</b>
            <table class="identitas" width="100%">
                <tr class="identitas">
                    <td class="identitas">No</td>
                    <td class="identitas"><b>Jenis Penghargaan</b></td>
                    <td class="identitas"><b>Institusi Pemberi Penghargaan</b></td>
                    <td class="identitas"><b>Tahun</b></td>
                </tr>
                @foreach($dosens->penghargaans as $penghargaan)
                    <tr class="identitas">
                        <td class="identitas">1.</td>
                        <td class="identitas">{{$penghargaan->jenispenghargaan1}}</td>
                        <td class="identitas">{{$penghargaan->institusi1}}</td>
                        <td class="identitas">{{$penghargaan->tahun1}}</td>
                    </tr>
                    <tr class="identitas">
                        <td class="identitas">2.</td>
                        <td class="identitas">{{$penghargaan->jenispenghargaan2}}</td>
                        <td class="identitas">{{$penghargaan->institusi2}}</td>
                        <td class="identitas">{{$penghargaan->tahun2}}</td>
                    </tr>
                @endforeach
            </table>

            <p>Semua data yang saya isikan dan tercantum dalam biodata ini adalah benar dan
                dapat dipertanggungjawabkan secara hukum. Apabila di kemudian hari ternyata
                dijumpai ketidaksesuaian dengan kenyataan, saya sanggup menerima sanksi.
                Demikian biodata ini saya buat dengan sebenarnya untuk memenuhi salah satu
                persyaratan dalam pengajuan Hibah <b>{{$items->type}}</b></p>

                <table width="100%">
                    <tr>
                        <td width="100%">&nbsp;</td>
                        <td width="100%" class="text-center">Jakarta, <?php echo date("d/m/Y"); ?></td>
                    </tr>
                    <tr>
                        <td width="100%">&nbsp;</td>
                        <td width="100%" class="text-center">Pengusul,</td>
                    </tr>
                    <tr>
                        <td width="100%">&nbsp;</td>    
                        <td width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="100%">&nbsp;</td>
                        <td width="100%" class="text-center">{{$dosens->name}}</td>
                    </tr>
                </table>
                
        
    </div>

    <div class="page-break"></div>

    <div class="justifikasianggaran">
        <span><b>Lampiran 2. Justifikasi Anggaran Kegiatan</b></span>
        <br>
        <span>1. Peralatan Penunjang</span>
        <table class="identitas" width="100%">
            <tr class="identitas">
                <td class="identitas">Material</td>
                <td class="identitas">Justifikasi pemakaian</td>
                <td class="identitas">Kuantitas</td>
                <td class="identitas">Harga Satuan(Rp)</td>
                <td class="identitas">Jumlah(Rp)</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">{{optional($penunjang)->material}}</td>
                <td class="identitas">{{optional($penunjang)->justifikasipemakaian}}</td>
                <td class="identitas">{{optional($penunjang)->kuantitas}}</td>
                <td class="identitas">Rp. {{number_format(optional($penunjang)->hargasatuan,2,",",".")}}</td>
                <td class="identitas">Rp. {{number_format(optional($penunjang)->kuantitas * optional($penunjang)->hargasatuan,2,",",".")}}</td>
            </tr>
            
            <tr class="identitas">
                <td class="identitas" colspan="4">SUBTOTAL (Rp)</td>
                <td class="identitas">Rp. {{number_format(optional($penunjang)->kuantitas * optional($penunjang)->hargasatuan,2,",",".")}}</td>
            </tr>
        </table>
        
        <br>
        <span>2. Bahan Habis Pakai</span>
        <table class="identitas" width="100%">
            <tr class="identitas">
                <td class="identitas">Material</td>
                <td class="identitas">Justifikasi pemakaian</td>
                <td class="identitas">Kuantitas</td>
                <td class="identitas">Harga Satuan(Rp)</td>
                <td class="identitas">Jumlah(Rp)</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">{{optional($habispakai)->material}}</td>
                <td class="identitas">{{optional($habispakai)->justifikasipemakaian}}</td>
                <td class="identitas">{{optional($habispakai)->kuantitas}}</td>
                <td class="identitas">Rp. {{number_format(optional($habispakai)->hargasatuan,2,",",".")}}</td>
                <td class="identitas">Rp. {{number_format(optional($habispakai)->kuantitas * optional($habispakai)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas" colspan="4">SUBTOTAL (Rp)</td>
                <td class="identitas">Rp. {{number_format(optional($habispakai)->kuantitas * optional($habispakai)->hargasatuan,2,",",".")}}</td>
            </tr>
        </table>
        <span>3. Perjalanan</span>
        <table class="identitas" width="100%">
            <tr class="identitas">
                <td class="identitas">Material</td>
                <td class="identitas">Justifikasi pemakaian</td>
                <td class="identitas">Kuantitas</td>
                <td class="identitas">Harga Satuan(Rp)</td>
                <td class="identitas">Jumlah(Rp)</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">{{optional($perjalanan)->material}}</td>
                <td class="identitas">{{optional($perjalanan)->justifikasipemakaian}}</td>
                <td class="identitas">{{optional($perjalanan)->kuantitas}}</td>
                <td class="identitas">Rp. {{number_format(optional($perjalanan)->hargasatuan,2,",",".")}}</td>
                <td class="identitas">Rp. {{number_format(optional($perjalanan)->kuantitas * optional($perjalanan)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas" colspan="4">SUBTOTAL (Rp)</td>
                <td class="identitas">Rp. {{number_format(optional($perjalanan)->kuantitas * optional($perjalanan)->hargasatuan,2,",",".")}}</td>
            </tr>   
        </table>
        
        <span>4. Lain-lain</span>
        <table class="identitas" width="100%">
            <tr class="identitas">
                <td class="identitas">Material</td>
                <td class="identitas">Justifikasi pemakaian</td>
                <td class="identitas">Kuantitas</td>
                <td class="identitas">Harga Satuan(Rp)</td>
                <td class="identitas">Jumlah(Rp)</td>
            </tr>
            <tr class="identitas">
                <td class="identitas">{{optional($lainlain)->material}}</td>
                <td class="identitas">{{optional($lainlain)->justifikasipemakaian}}</td>
                <td class="identitas">{{optional($lainlain)->kuantitas}}</td>
                <td class="identitas">Rp. {{number_format(optional($lainlain)->hargasatuan,2,",",".")}}</td>
                <td class="identitas">Rp. {{number_format(optional($lainlain)->kuantitas * optional($lainlain)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas" colspan="4" >SUBTOTAL (Rp)</td>
                <td class="identitas">Rp. {{number_format(optional($lainlain)->kuantitas * optional($lainlain)->hargasatuan,2,",",".")}}</td>
            </tr>
            <tr class="identitas">
                <td class="identitas" colspan="4" >Total (Keseluruhan) (Rp)</td>
                <td class="identitas">Rp. {{number_format((optional($lainlain)->kuantitas * $lainlain->hargasatuan) + ($perjalanan->kuantitas * $perjalanan->hargasatuan) + ($habispakai->kuantitas * $habispakai->hargasatuan) + ($penunjang->kuantitas * $penunjang->hargasatuan),2,",",".")}}</td>
            </tr>
        </table>
    </div>
    
    <div class="page-break"></div>
    
    <div class="susunanorgansiasi">
        <span><b>Lampiran 3. Susunan Organisasi Tim Penyusun dan Pembagian Tugas</b></span>
        <table class="identitas">
                <tr>
                    <td class="identitas">No.</td>
                    <td class="identitas">Nama/NIM</td>
                    <td class="identitas">Program Studi</td>
                    <td class="identitas">Bidang Ilmu</td>
                    <td class="identitas">Alokasi Waktu (jam/minggu)</td>
                    <td class="identitas">Uraian Tugas</td>
                </tr>
            <?php $nomor = 1 ?>
            @foreach($identitas as $data)
                <tr>
                    <td class="identitas">{{$nomor}}</td>
                    <td class="identitas">{{$data->name}} / {{$data->nim}}</td>
                    <td class="identitas">{{$data->jurusan}}</td>
                    <td class="identitas">{{$data->bidangilmu}}</td>
                    <td class="identitas">{{$data->alokasiwaktu}}</td>
                    <td class="identitas">{{$data->uraiantugas}}</td>
                </tr>
            <?php $nomor++ ?>
            @endforeach
        </table>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                if ($PAGE_COUNT > 1 && $PAGE_NUM > 2) {
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                    $size = 12;
                    $pageText =  $PAGE_NUM - 2;
                    $y = $y = $pdf->get_height()-35;
                    $x = 520;
                    $pdf->text($x, $y, $pageText, $font, $size);
                }
            ');
        }
    </script>

</body>
</html>
