@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Sektor</h1>
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
          <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&nbsp;Sektor</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Sektor</center></th>
                <th><center>Action</center></th>
              
              </tr>
            </thead>
            <tbody>
           @foreach($datasektor as $key => $datas)
              <tr>
                <td><center>{{ ++$key }}</center></td>
                <td>{{ $datas->nama_sektor }}</td>
                <td><center>           
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $datas->id_sektor }}">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->id_sektor }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </center>
                </td>
              </tr>
              <div class="modal fade" id="edit{{ $datas->id_sektor }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Sektor</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ url('data_sektor/edit/'.$datas->id_sektor) }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label>Nama Sektor</label>
                          <input type="text" class="form-control" name="nama_sektor" value="{{ $datas->nama_sektor }}" required="">
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

              <div class="modal fade" id="hapus{{ $datas->id_sektor }}">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Data Sektor</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p> Apakah anda yakin ingin menghapus <b>{{ $datas->nama_sektor }}</b>? </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                      <a href="{{ url('data_sektor/hapus/'.$datas->id_sektor) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
        <h4 class="modal-title">Tambah Data Sektor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('data_sektor/create') }}" id="sektorcreate" method="post" role="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label>Nama Sektor</label>
            <input type="text" class="form-control" name="nama_sektor">
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
    $('#sektorcreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nama_sektor : {
                required:true
            },
            
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nama_sektor : {
                required: "Nama Sektor tidak boleh kosong"
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