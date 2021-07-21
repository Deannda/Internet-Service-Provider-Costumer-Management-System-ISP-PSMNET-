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
				<h1>Tambah Data Pelanggan</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active"></li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<form action="{{ url('pelanggan_all/create') }}" id="pelanggancreate" method="post" role="form"
enctype="multipart/form-data">
@csrf
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="card-body">
						<div class="row col-lg-12">
							<div class="col-lg-6">
								<div class="form-group">
									<label>ID Pelanggan</label>
									<input type="text" class="form-control" name="id_pelanggan">
								</div>
								<div class="form-group">
									<label>Status Layanan</label>
									<input type="text" name="status_layanan" value="Aktif" class="form-control"
									disabled="">
								</div>
								<div class="form-group">
									<label>Nama Pelanggan</label>
									<input type="text" class="form-control" name="nama_pelanggan">
								</div>
								<div class="form-group">
									<label>NIK</label>
									<input type="text" class="form-control" name="nik_pelanggan">
								</div>
								<div class="form-group">
									<label>Alamat KTP</label>
									<input type="text" class="form-control" name="alamat_ktp">
								</div>
								<div class="form-group">
									<label>Alamat Instalasi</label>
									<input type="text" class="form-control" name="alamat_instansi">
								</div>
								<div class="form-group">
									<label>Alamat Penagihan</label>
									<input type="text" class="form-control" name="alamat_penagihan">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="form-group">
										<label>No. HP</label>
										<input type="text" class="form-control" name="no_hp">
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input type="text" class="form-control" name="email">
									</div>
									<div class="form-group">
										<label>Tipe Pengguna</label>
										<select name="tipe" class="form-control select2" style="width: 100%;">
											<option value="">Pilih Tipe Pengguna</option>
											@foreach($tipe as $data)
											<option
											value="{{ $data->id_tipe_pengguna }}">{{ $data->tipe_pengguna }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Kategori Pelanggan</label>
										<select name="kategori" class="form-control select2" style="width: 100%;">
											<option value="">Pilih Kategori Pelanggan</option>
											@foreach($kategori as $data)
											<option
											value="{{ $data->id_kategori }}">{{ $data->nama_kategori }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Sektor</label>
										<select name="sektor" class="form-control select2" style="width: 100%;">
											<option value="">Pilih Sektor</option>
											@foreach($sektor as $data)
											<option value="{{ $data->id_sektor }}">{{ $data->nama_sektor }}</option>
											@endforeach
										</select>
									</div>

									<input type="hidden" name="foto_ktp" value="{{ $data->foto_ktp }}">
									<div class="form-group">
										<label for="exampleInputFile">Foto KTP</label><br>
										<input type="file" name="foto_ktp">
									</div>

								</div>

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
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body" id="dynamic_layanan">
								<div class="card-body">
									<div class="row col-lg-12">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Layanan</label>
												<select name="layanan[]" class="form-control " style="width: 100%;">
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
												<label>Tipe Bandwith</label>
												<select name="id_tipe_bw" class="form-control select2"
												style="width: 100%;">
												<option value="">Pilih Tipe Bandwith</option>
												@foreach($datatipebw as $data)  
												<option value="{{ $data->id_tipe_bw }}">{{ $data->tipe_bw }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label>Harga Penawaran :</label>
											<input type="text" class="form-control" name="penawaran_layanan">
										</div>
										<div class="form-group">
											<label>Tanggal Aktivasi Layanan</label>

											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
												</div>
												<input type="text" class="form-control tanggal" name="tanggal_aktivasi_layanan[]">
											</div>

										</div>
										<div class="form-group">
											<label>Status Penagihan Layanan</label>
											<select name="status_penagihan[]"
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
										<label>Lokasi Layanan :</label>
										<input type="text" class="form-control" name="alamat[]">
									</div>
									<div class="form-group">
										<label>POP</label>
										<select name="pop[]" class="form-control select2" style="width: 100%;">
											<option value="">Pilih pop</option>
											@foreach($pop as $data)
											<option value="{{ $data->id_pop }}">{{ $data->nama_pop }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Datek IP Address :</label>
										<input type="text" class="form-control" name="datek_ip_address[]">
									</div>
									<div class="form-group">
										<label>Notes :</label>
										<input type="text" class="form-control" name="notes[]">
									</div>
									<input type="hidden" name="file_kontrak" value="{{ $data->file_kontrak }}">
									<div class="form-group">
										<label for="exampleInputFile">File Kontrak </label><br>
										<input type="file" name="file_kontrak">
									</div>

									<div class="form-group">
										<input type="checkbox" name="hak_khusus" value="Telat 3 bulan pembayaran tanpa suspend layanan">
										<label>Telat 3 bulan pembayaran tanpa suspend layanan</label>
									</div>
								</div>

							</div>
						</div>

					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>

		<div class="modal-footer right-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<button type="button" id="add" class="btn btn-success">Add layanan</button>
			<button type="submit" class="btn btn-primary">Tambah</button>
		</div>
	</section>
</form>
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
	$('.select2').select2()
	$(document).ready(function () {

		$('.select2').select2()

		$('.tanggal').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true
		});

		$('#pelanggancreate').validate({
			rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            id_pelanggan : {
            	required:true
            },
            nama_pelanggan : {
            	required:true
            },
            nik_pelanggan : {
            	required:true
            },
            alamat_ktp : {
            	required:true
            },
            alamat_instansi : {
            	required:true
            },
            alamat_penagihan : {
            	required:true
            },
            no_hp : {
            	required:true
            },
            email : {
            	required:true
            },
            tanggal_aktivasi_layanan : {
            	required:true
            },
            lokasi_layanan : {
            	required:true
            },
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            id_pelanggan : {
            	required: "ID Pelanggan tidak boleh kosong"
            },
            nama_pelanggan : {
            	required: "Nama Pelanggan tidak boleh kosong"
            }, 
            nik_pelanggan : {
            	required: "NIK tidak boleh kosong"
            }, 
            alamat_ktp : {
            	required: "Alamat KTP tidak boleh kosong"
            },
            alamat_instansi : {
            	required: "Alamat instalasi tidak boleh kosong"
            },
            alamat_penagihan : {
            	required: "Alamat penagihan tidak boleh kosong"
            },    
            no_hp : {
            	required: "NO HP tidak boleh kosong"
            },    
            email : {
            	required: "E-mail tidak boleh kosong"
            },
            tanggal_aktivasi_layanan : {
            	required: "Tanggal aktivasi tidak boleh kosong"
            },
            lokasi_layanan : {
            	required: "Lokasi layanan tidak boleh kosong"
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





		$('#add').click(function(){
			let i = 0;
			i++;
			$('#dynamic_layanan').append(` <div class="card-body">
				<div class="row col-lg-12">
				<div class="col-lg-6">
				<div class="form-group">
				<label>Layanan</label>
				<select name="layanan[]" class="form-control " style="width: 100%;">
				<option value="">Pilih Layanan</option>
				@foreach($datalayanan as $data)
				<option value="{{ $data->id_layanan }}">{{ $data->nama_layanan }}</option>
				@endforeach
				</select>
				</div>
				<div class="form-group">
				<label>Tanggal Aktivasi Layanan</label>

				<div class="input-group">
				<div class="input-group-prepend">
				<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" class="form-control tanggal" name="tanggal_aktivasi_layanan[]">
				</div>

				</div>
				<div class="form-group">
				<label>Status Penagihan Layanan</label>
				<select name="status_penagihan[]"
				class="form-control select2">
				<option value="" selected="true">Pilih Penagihan</option>
				<option value="Berbayar">Berbayar</option>
				<option value="Free" >Free
				</option>
				</select>
				</div> 
				<div class="form-group">
				<label>Lokasi Layanan :</label>
				<input type="text" class="form-control" name="alamat[]">
				</div>
				</div>
				<div class="col-lg-6">
				<div class="form-group">
				<label>POP</label>
				<select name="pop[]" class="form-control select2" style="width: 100%;">
				<option value="">Pilih pop</option>
				@foreach($pop as $data)
				<option value="{{ $data->id_pop }}">{{ $data->nama_pop }}</option>
				@endforeach
				</select>
				</div>
				<div class="form-group">
				<label>Datek IP Address :</label>
				<input type="text" class="form-control" name="datek_ip_address[]">
				</div>
				<div class="form-group">
				<label>Notes :</label>
				<input type="text" class="form-control" name="notes[]">
				</div>
				<div class="form-group">
				<label for="exampleInputFile">File Kontrak </label><br>
				<input type="file" name="file_kontrak">
				</div>

				<div class="form-group">
				<input type="checkbox" name="hak_khusus" value="Telat 3 bulan pembayaran tanpa suspend layanan">
				<label>Telat 3 bulan pembayaran tanpa suspend layanan</label>
				</div>
				</div>

				</div>
				</div>`);

		});
		$(document).on('click', '.btn_remove', function(){
			var button_id = $(this).attr("id");
			$('#row'+button_id+'').remove();
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
