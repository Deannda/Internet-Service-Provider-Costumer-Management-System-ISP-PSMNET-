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
                    <h1>Data Layanan Pelanggan</h1>
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

                        <a href="{{ url('tambah_layanan_pelanggan_berbayar/'.$nopelanggan)}}" type="button"
                           class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Layanan</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Nama pelanggan</center>
                                </th>
                                <th>
                                    <center>Layanan</center>
                                </th>
                                 <th>
                                    <center>Lokasi layanan</center>
                                </th>
                                <th>
                                    <center>Status layanan pelanggan</center>
                                </th> <!-- aktif/nonaktif -->
                                <th>
                                    <center>Status penagihan layanan</center>
                                </th> <!-- Free/Berbayar -->
                                <th>
                                    <center>Tanggal aktivasi layanan</center>
                                </th>
                                <th>
                                    <center>Tanggal nonaktif layanan</center>
                                </th>
                                <th>
                                    <center>Perangkat/Barang</center>
                                </th>
                    
                                <th>
                                    <center>Action</center>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datalayananpelanggan as $key => $datas)
                                <td>{{ ++$key }}</td>
                                <td>{{ $datas->datapelanggan[0]->nama_pelanggan }}</td>
                                @if($datas->id_layanan != null)
                                    <td>{{ $datas->layanan[0]->nama_layanan }}</td>
                                @else
                                    <td> nama layanan kosong</td>
                                @endif
                                <td>{{ $datas->lokasi_layanan }}</td>
                                <td>{{ $datas->status_layanan_pelanggan }}</td>
                                <td>{{ $datas->status_penagihan_layanan }}</td>
                                <td>{{ date('d-M-Y',strtotime($datas->tanggal_aktivasi_layanan)) }}</td>
                                <td>
                                    @if( $datas->status_layanan_pelanggan == "Non Aktif")
                                    {{ date('d-M-Y',strtotime($datas->tanggal_nonaktif_layanan)) }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if(count($datas->devout) !== 0)
                                    @foreach($datas->devout as $barang)
                                    <li><strong>Nama:</strong> {{ $barang->dev_name }} <strong>Tipe:</strong> {{ $barang->dev_type }} <strong>Merk:</strong> {{ $barang->dev_mark}} <strong>(Cash)</strong></li>
                                    @endforeach
                                    @else
                                    @foreach($datas->devsewa as $perangkat)
                                    <li><strong>Nama:</strong> {{ $perangkat->stdevice[0]->devicename[0]->dev_name}}  <strong>Tipe:</strong> {{ $perangkat->stdevice[0]->devicemodel[0]->tipe}} <strong>Merk:</strong> {{ $perangkat->stdevice[0]->devicebrand[0]->merk}} <strong>({{ $perangkat->jenis_pelanggan }})</strong></li>
                                    @endforeach
                                    @endif
                                    </td>

                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $datas->user_id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $datas->user_id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </td>

                                </tr>
                                <div class="modal fade" id="edit{{ $datas->user_id }}">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h4 class="modal-title">Edit Data Layanan Pelanggan </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form
                                                action="{{ url('data_layanan_pelanggan/edit/'.$datas->user_id.'/'.$datas->id_pelanggan) }}"
                                                method="post" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="row col-lg-12">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Layanan :</label>
                                                                <select name="layanan" class="form-control select2"
                                                                        style="width: 100%;">
                                                                    <option value="">Pilih Layanan</option>
                                                                    @foreach($datalayanan as $data)
                                                                        @if($data->id_layanan == $datas->id_layanan)
                                                                            <option value="{{ $data->id_layanan }}"
                                                                                    selected="true">{{ $data->nama_layanan }}</option>
                                                                        @else
                                                                            <option
                                                                                value="{{ $data->id_layanan }}">{{ $data->nama_layanan }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status Layanan Pelanggan</label>
                                                                <select name="status_layanan_pelanggan"
                                                                        class="form-control select2">
                                                                    @if($datas->status_layanan_pelanggan == 'Aktif')
                                                                        <option value="Aktif" selected="true">Aktif
                                                                        </option>
                                                                        <option value="Non Aktif">Non Aktif</option>
                                                                    @else
                                                                        <option value="Aktif">Aktif</option>
                                                                        <option value="Non Aktif" selected="true">Non
                                                                            Aktif
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status Penagihan Layanan</label>
                                                                <input type="text" name="status_penagihan_layanan"
                                                                       value="Berbayar" class="form-control"
                                                                       disabled="">
                                                                <input type="hidden" name="status_penagihan"
                                                                       value="Berbayar" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Aktivasi Layanan :</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="far fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control tanggal"
                                                                           value="{{ date('d-m-Y',strtotime($datas->tanggal_aktivasi_layanan)) }}"
                                                                           name="tanggal_aktivasi_layanan">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                              <label>Lokasi Layanan :</label>
                                                              <input type="text" class="form-control" name="lokasi_layanan" value="{{ $datas->lokasi_layanan }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                              <div class="form-group">
                                                                <label>POP :</label>
                                                                <select name="pop" class="form-control select2"
                                                                        style="width: 100%;">
                                                                    <option value="">Pilih POP</option>
                                                                    @foreach($pop as $data)
                                                                        @if($data->id_pop == $datas->id_pop)
                                                                            <option value="{{ $data->id_pop }}"
                                                                                    selected="true">{{ $data->nama_pop }}</option>
                                                                        @else
                                                                            <option
                                                                                value="{{ $data->id_pop }}">{{ $data->nama_pop }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Notes :</label>
                                                                <input type="text" class="form-control" name="notes"
                                                                       value="{{ $datas->notes }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Datek IP Address :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $datas->datek_ip_address }}"
                                                                       name="datek_ip_address">
                                                            </div>
                                                               <div class="form-group">
                                                                <label>Tanggal Non Aktif Layanan :</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="far fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control tanggal"
                                                                           value="{{ date('d-m-Y',strtotime($datas->tanggal_nonaktif_layanan)) }}"
                                                                           name="tanggal_nonaktif_layanan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>


                                <div class="modal fade" id="delete{{ $datas->user_id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Data Pelanggan</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p> Apakah anda yakin ingin menghapus Layanan <b>
                                                        @if($datas->id_layanan != null)
                                                            {{ $datas->layanan[0]->nama_layanan }}
                                                        @endif
                                                    </b> milik
                                                    <b>{{ $datas->datapelanggan[0]->nama_pelanggan }}</b>? </p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light"
                                                        data-dismiss="modal">Batal
                                                </button>
                                                <a href="{{ url('data_layanan_pelanggan/delete/'.$datas->user_id.'/'.$datas->id_pelanggan)  }}"
                                                   type="button" class="btn btn-outline-light">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


        <!-- /.modal -->

        <!-- /.row -->
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
