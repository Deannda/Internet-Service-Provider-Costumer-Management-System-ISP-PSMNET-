@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tagihan Jatuh Tempo</h1>
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

        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Pelanggan</center></th>
                <th><center>Nama Layanan</center></th>
                <th><center>Total Tagihan</center></th>
                <th><center>Tanggal Terbit</center></th>
                <th><center>Status Tagihan</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
       
              <tr>
                <td><center></center></td>
                <td></td>
                <td> </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <center>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#">
                      <strong>Lunas+Cetak Invoice
                      </strong>
                    </button>
                  </center>      
                </td>
              </tr>
                <div class="modal fade" id="terbitkan">
                <div class="modal-dialog">
                  <div class="modal-content bg-warning">
                    <div class="modal-header">
                      <h4 class="modal-title">Terbitkan Tagihan Pelanggan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="#">
                      <div class="modal-body">
                        <p> Apakah anda yakin ingin menerbitkan tagihan <b></b>? </p>
                  
                        <input type="hidden" name=" "value="">
                      
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-dark">Terbitkan</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>


    
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