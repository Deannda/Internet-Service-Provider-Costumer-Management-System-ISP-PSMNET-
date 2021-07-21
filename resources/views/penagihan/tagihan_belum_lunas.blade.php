@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tagihan Belum Lunas</h1>
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
              @foreach($data as $key => $tagihan)
              <tr>
                <td><center>{{ ++$key }}</center></td>
                <td>{{ $tagihan->pelanggan[0]->nama_pelanggan }}</td>
                <td>{{ $tagihan->layanan[0]->layanan[0]->nama_layanan }} </td>
                <td>{{ $tagihan->layanan[0]->layanan[0]->harga_layanan }}</td>
                <td>{{ $tagihan->tanggal_tagihan }} </td>
                <td>{{ $tagihan->status_tagihan }}</td>
                <td>
                  <center>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#terbitkan{{ $tagihan->id_pelanggan }}">
                      <strong>Lunas+Cetak Invoice
                      </strong>
                    </button>
                  </center>      
                </td>
              </tr>
                <div class="modal fade" id="terbitkan{{ $tagihan->id_pelanggan }}">
                <div class="modal-dialog">
                  <div class="modal-content bg-warning">
                    <div class="modal-header">
                      <h4 class="modal-title">Terbitkan Tagihan Pelanggan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ url('invoicesuspend') }}">
                      <div class="modal-body">
                        <p> Apakah anda yakin ingin menerbitkan tagihan <b></b>? </p>
                        @foreach($tagihan->pelanggan[0]->datalayanan as $layanan)
                        @if(count($layanan->layanan) != 0)
                        <input type="hidden" name="id_layanan[]" value="{{ $layanan->user_id }}">
                        @endif
                        @endforeach
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