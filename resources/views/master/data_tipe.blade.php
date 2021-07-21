@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Tipe Pengguna</h1>
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
          <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&nbsp;Tipe Pengguna</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Tipe Pengguna</center></th>
                <th><center>Action</center></th>
              
              </tr>
            </thead>
            <tbody>
           @foreach($datatipepengguna as $key => $datas)
              <tr>
                <td><center>{{ ++$key }}</center></td>
                <td>{{ $datas->tipe_pengguna }}</td>
                <td><center>            
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $datas->id_tipe_pengguna }}">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->id_tipe_pengguna }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </center>
                </td>
              </tr>
              <div class="modal fade" id="edit{{ $datas->id_tipe_pengguna }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Tipe Pengguna</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ url('data_tipe_pengguna/edit/'.$datas->id_tipe_pengguna) }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label>Tipe Pengguna</label>
                          <input type="text" class="form-control" name="tipe_pengguna" value="{{ $datas->tipe_pengguna }}" required="">
                        </div>     
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                      </div>
                    </form>

                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

              <div class="modal fade" id="hapus{{ $datas->id_tipe_pengguna }}">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Data Tipe Pengguna</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p> Apakah anda yakin ingin menghapus <b>{{ $datas->tipe_pengguna }}</b>? </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                      <a href="{{ url('data_tipe_pengguna/hapus/'.$datas->id_tipe_pengguna) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Tipe Pengguna</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('data_tipe_pengguna/create') }}" id="tipecreate" method="post" role="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label>Tipe Pengguna</label>
            <input type="text" class="form-control" name="tipe_pengguna">
          </div>    
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection


@section('js')
<script type="text/javascript">

    // sesuiakan dengan id yang ada pada form
    $('#tipecreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            tipe_pengguna : {
                required:true
            },
            
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            tipe_pengguna : {
                required: "Tipe Pengguna tidak boleh kosong"
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
</script>
<!-- DataTables -->
<script src="adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
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