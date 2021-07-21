@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection


@section('content')
<section class="content-header bg-primary">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Data Layanan Pelanggan</h1>
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
        <div class="card-body">

         <form action="{{ url('tambah_layanan_pelanggan_all/create/'.$nopelanggan) }}" id="tambahlayananpelangganberbayar" method="post" role="form">
          @csrf
          <div class="card-body">
            <div class="row col-lg-12">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Layanan :</label>
                  <select name="layanan" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih Layanan</option>
                    @foreach($datalayanan as $data)
                    <option value="{{ $data->id_layanan }}">{{ $data->nama_layanan }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Catatan Layanan :</label>
                  <input type="text" class="form-control" name="catatan_layanan">
                </div>
                <div class="form-group">
                  <label>Tipe Bandwith :</label>
                  <select name="id_tipe_bw" class="form-control select2"
                  style="width: 100%;">
                  <option value="">Pilih Tipe Bandwith</option>
                  @foreach($datatipebw as $data)  
                  <option value="{{ $data->id_tipe_bw }}">{{ $data->tipe_bw }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Status Layanan Pelanggan</label>
                <input type="text" name="status_layanan_pelanggan" value="Aktif" class="form-control"
                disabled="">
              </div>
              <div class="form-group">
                <label>Status Penagihan Layanan</label>
                <select name="status_penagihan"
                class="form-control select2">
                <option value="" selected="true">Pilih Penagihan</option>
                <option value="Berbayar">Berbayar</option>
                <option value="Free" >Free
                </option>
              </select>
            </div>
            
          </div>
          <div class="col-lg-6">
           <div class="form-group">
             <label>Tanggal Aktivasi Layanan :</label>
             <div class="input-group">
               <div class="input-group-prepend">
                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
               </div>
               <input type="text" class="form-control tanggal" name="tanggal_aktivasi_layanan">
             </div>
           </div>
           
           <div class="form-group">
            <label>Lokasi Layanan :</label>
            <input type="text" class="form-control" name="lokasi_layanan">
          </div>
          <div class="form-group">
            <label>POP</label>
            <select name="pop" class="form-control select2" style="width: 100%;">
              <option value="">Pilih pop</option>
              @foreach($pop as $data)
              <option value="{{ $data->id_pop }}">{{ $data->nama_pop }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Datek IP Address :</label>
            <input type="text" class="form-control" name="datek_ip_address">
          </div>
          <div class="form-group">
            <label>Notes :</label>
            <input type="text" class="form-control" name="notes">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer right-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>

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
