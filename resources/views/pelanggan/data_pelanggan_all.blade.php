@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection


@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Semua Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <a href ="{{ url('tambah_pelanggan_all')}}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Pelanggan</a>

                    <div class="card-tools">
                        <form action="{{ url('klasifikasi') }}" method="post" style="padding: 10px">
                            @csrf
                            <div class="btn-group">
                                <div class="col-lg-12">
                                    <select name="statusPelanggan" class="form-control select2" style="width: 100%;">
                                        <option value="">Status Pelanggan</option>

                                        <option value="Aktif">Aktif</option>

                                        <option value="Non Aktif">Non-Aktif</option>

                                    </select>
                                </div>
                            </div>

                            <div class="btn-group">
                                <div class="col-lg-12">
                                    <select name="kategori" class="form-control select2" style="width: 100%;">
                                        <option value="">Kategori Pelanggan</option>
                                        @foreach ($kategori as $data)
                                        @if(!is_null($request) && $request->kategori == $data->id_kategori)
                                        <option value="{{ $data->id_kategori }}" selected="true">{{ $data->nama_kategori }}</option>
                                        @else
                                        <option value="{{ $data->id_kategori }}">{{ $data->nama_kategori }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="btn-group">
                                <div class="col-lg-12">
                                    <select name="tipe" class="form-control select2" style="width: 100%;">
                                        <option value="">Tipe pengguna</option>
                                        @foreach ($tipe as $data)
                                        @if(!is_null($request) && $request->tipe == $data->id_tipe_pengguna)
                                        <option value="{{ $data->id_tipe_pengguna }}" selected="true">{{ $data->tipe_pengguna }}</option>
                                        @else
                                        <option value="{{ $data->id_tipe_pengguna }}">{{ $data->tipe_pengguna }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="btn-group">
                                <div class="col-lg-12">
                                    <select name="sektor" class="form-control select2" style="width: 100%;">
                                        <option value="">Sektor pengguna</option>
                                        @foreach ($sektor as $data)
                                        @if(!is_null($request) &&  $request->sektor == $data->id_sektor )
                                        <option value="{{ $data->id_sektor }}" selected="true">{{ $data->nama_sektor }}</option>
                                        @else
                                        <option value="{{ $data->id_sektor }}">{{ $data->nama_sektor }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="btn-group">
                                <div class="col-lg-12">
                                    <select name="layanan" class="form-control select2" style="width: 100%;">
                                        <option value="">Layanan Pelanggan</option>
                                        @foreach ($datalayanan as $data)
                                        @if(!is_null($request) &&  $request->layanan == $data->id_layanan)
                                        <option value="{{ $data->id_layanan }}" selected="true">{{ $data->nama_layanan }}</option>
                                        @else
                                        <option value="{{ $data->id_layanan }}">{{ $data->nama_layanan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="btn-group">
                                <div class="col-lg-12">
                                    <select name="status_tagihan" class="form-control select2" style="width: 100%;">
                                        <option value="">Status Penagihan</option>

                                        <option value="Berbayar">Berbayar</option>

                                        <option value="Free">Free</option>

                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-info" type="submit">Cek</button>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <center>ID Pelanggan</center>
                                </th>
                                <th>
                                    <center>Nama Pelanggan</center>
                                </th>
                                <th>
                                    <center>Alamat Penagihan</center>
                                </th>
                            <!-- <th>
                                <center>Tipe Pelanggan</center>
                            </th>
                            <th>
                                <center>Kategori Pelanggan</center>
                            </th>
                            <th>
                                <center>Sektor</center>
                            </th> -->
                            <th>
                                <center>Layanan</center>
                            </th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapelanggan as $key => $datas)
                        <tr>
                       
                            <td>
                                <center>{{ $datas->id_pelanggan }}</center>
                            </td>
                            <td>{{ $datas->name }}</td>
                            <td>{{ $datas->alamat_penagihan }}</td>
                         
                        <td>

                            @if(count($datas->datalayanan) != 0)
                            @foreach($datas->datalayanan as $namaLayanan)
                            @foreach($namaLayanan->layanan as $listNamaLayanan)
                            <li><a href ="{{ url('data_layanan_pelanggan_all/'.$datas->id_pelanggan) }}">{{ $listNamaLayanan->nama_layanan }}</a>
                            </li>
                            @endforeach
                            @endforeach
                            @endif
                            <!-- <a href ="{{ url('data_layanan_pelanggan_all/'.$datas->id_pelanggan) }}" type="button" class="btn btn-primary btn-sm">Layanan</a> -->

                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#info{{ $datas->id_pelanggan }}">
                            <i class="fas fa-info"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="#edit{{ $datas->id_pelanggan }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#hapus{{ $datas->id_pelanggan }}">
                    <i class="fas fa-trash-alt"></i>
          <!--       </button>
                   <a href ="{{ url('riwayat_tagihan_pelanggan_berbayar') }}" type="button" class="btn btn-success btn-sm">
                    <strong>Riwayat</strong></a>
                </button>
            -->

        </td>
    </tr>


    <div class="modal fade" id="info{{ $datas->id_pelanggan }}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Info
                        Pelanggan {{ $datas->name }} </h4>
                        <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="row col-lg-50">
                            <div class="col-lg-20">
                                <div class="form-group">
                                    <img
                                    src="{{ url('storage/foto_ktp/'. $datas->foto_ktp) }}"
                                    height="200" width="400">
                                </div>
                                <div class="form-group">
                                    <p><strong>Status Pelanggan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->status_pelanggan }}</p>
                                    </div>
                                    <div class="form-group">
                                        <p><strong>Nama Pelanggan</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <p><strong>NIK</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->nik }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p><strong>Alamat KTP</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->alamat_ktp }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p><strong>Alamat Instalasi</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->alamat_instansi }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p><strong>Alamat Penagihan</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->alamat_penagihan }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p><strong>No. HP</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->no_hp }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p><strong>E-mail</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p><strong>Pengguna</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                                                    @if(count($datas->tipepengguna) != 0)
                                                    {{$datas->tipepengguna[0]->tipe_pengguna}}</p>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <p><strong>Kategori Pelanggan</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;: 
                                                    @if(count($datas->kategoripelanggan) != 0)
                                                        {{$datas->kategoripelanggan[0]->nama_kategori}}
                                                    @endif</p>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <p><strong>Sektor</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                    @if(count($datas->datasektor) != 0)
                                                             {{$datas->datasektor[0]->nama_sektor}}
                                                         @endif</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <p><strong>Device Name</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$datas->dev_name}}</p>
                                                            </div>

                                                            <div class="form-group">
                                                                <p><strong>Layanan</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    @if(count($datas->datalayanan) != 0)
                                                                    @foreach($datas->datalayanan as $listlayanan)
                                                                    <li>
                                                                        @foreach($listlayanan->layanan as $datal)
                                                                        {{ $datal->nama_layanan }}
                                                                        @endforeach
                                                                        <strong>(Tanggal Aktivasi layanan : {{ $listlayanan->tanggal_aktivasi_layanan }})</strong></li>
                                                                        @endforeach
                                                                        @endif
                                                                    </p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer right-content-between">
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                        data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                    data-toggle="modal" data-target="#">Print
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                            <div class="modal fade" id="edit{{ $datas->id_pelanggan }}">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h4 class="modal-title">Edit Data Pelanggan Berbayar</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form
                                    action="{{ url('pelanggan_berbayar/edit/'.$datas->id_pelanggan) }}"
                                    method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Status Pelanggan</label>
                                                    <select class="form-control select2"
                                                    name="status_pelanggan">
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Non Aktif">Non Aktif</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Pelanggan</label>
                                                <input type="text" class="form-control"
                                                name="nama_pelanggan"
                                                value="{{ $datas->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text" class="form-control"
                                                name="nik_pelanggan"
                                                value="{{ $datas->nik }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat KTP</label>
                                                <input type="text" class="form-control"
                                                name="alamat_ktp"
                                                value="{{ $datas->alamat_ktp }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Instalasi</label>
                                                <input type="text" class="form-control"
                                                name="alamat_instansi"
                                                value="{{ $datas->alamat_instansi }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Penagihan</label>
                                                <input type="text" class="form-control"
                                                name="alamat_penagihan"
                                                value="{{ $datas->alamat_penagihan }}">
                                            </div>
                                            <div class="form-group">
                                                <label>No. HP</label>
                                                <input type="text" class="form-control" name="no_hp"
                                                value="{{ $datas->no_hp }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="text" class="form-control"
                                                    name="email" value="{{ $datas->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pilih Tipe Pengguna:</label>
                                                    <select name="tipe" class="form-control select2"
                                                    style="width: 100%;">
                                                    @if(count($datas->tipepengguna) != 0)

                                                    <option
                                                    value="{{$datas->tipepengguna[0]->id_tipe_pengguna}}"> {{$datas->tipepengguna[0]->tipe_pengguna}}</option>
                                                    @endif
                                                   
                                                    @foreach ($tipe as $data)
                                                    <option
                                                    value="{{$data->id_tipe_pengguna}}">{{$data->tipe_pengguna}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Kategori Pelanggan:</label>
                                                <select name="kategori"
                                                class="form-control select2"
                                                style="width: 100%;">
                                                    @if(count($datas->kategoripelanggan) != 0)
                                                <option
                                                value="{{$datas->kategoripelanggan[0]->id_kategori}}"> {{$datas->kategoripelanggan[0]->nama_kategori}}</option>
                                                @endif
                                                @foreach ($kategori as $data)
                                                <option
                                                value="{{$data->id_kategori}}">{{$data->nama_kategori}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Sektor:</label>
                                            <select name="sektor"
                                            class="form-control select2"
                                            style="width: 100%;">
                                                    @if(count($datas->datasektor) != 0)
                                            <option
                                            value="{{$datas->datasektor[0]->id_sektor}}"> {{$datas->datasektor[0]->nama_sektor}}</option>

                                            @endif
                                            @foreach ($sektor as $data)
                                            <option
                                            value="{{$data->id_sektor}}">{{$data->nama_sektor}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="hidden" name="foto_ktp"
                                    value="{{ $datas->foto_ktp }}">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto
                                        KTP</label><br>
                                        <input type="file" name="foto_ktp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                        data-dismiss="modal">Batal
                    </button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="hapus{{ $datas->id_pelanggan }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p> Apakah anda yakin ingin menghapus
                <b>{{ $datas->name }}</b>? </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light"
                data-dismiss="modal">Batal
            </button>
            <a href="{{ url('data_pelanggan/delete/'.$datas->id_pelanggan.'/all') }}"
               type="button" class="btn btn-outline-light">Hapus</a>
           </div>
       </div>
       <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

@endforeach

</tbody>
</table>
</div>
</div>
</div>

</div>

</section>
@endsection


@section('js')
    <!-- <script type="text/javascript">

    // sesuiakan dengan id yang ada pada form
    $('#layanancreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nama_layanan : {
                required:true
            },

        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nama_layanan : {
                required: "Nama Layanan tidak boleh kosong"
            },

        },

        // yang dibawah gak perlu diedit
        errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
    });
</script> -->
<!-- DataTables -->
<script src="{{ asset ('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset ('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset ('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset ('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset ('adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset ('datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset ('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset ('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset ('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2()

        $('.tanggal').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });

    });
</script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
@endsection
