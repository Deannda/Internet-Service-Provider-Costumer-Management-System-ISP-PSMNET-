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
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">

					<a href="{{ url('tambah_layanan_pelanggan_all/'.$nopelanggan) }}" type="button"
					class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Layanan</a>

					<a href="{{ url('history_layanan_pelanggan/'.$nopelanggan) }}" type="button"
					class="btn btn-success btn-sm"><i class="fas fa-history"></i>&nbsp;History</a>
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
									<center>Nama</center>
								</th>
								<th>
									<center>Layanan</center>
								</th>
								<th>
									<center>Bandwith</center>
								</th>
								<th>
									<center>Lokasi</center>
								</th>
								<th>
									<center>Status Layanan</center>
								</th> <!-- aktif/nonaktif -->
								<th>
									<center>Status penagihan</center>
								</th> <!-- Free/Berbayar -->         
								<th>
									<center>Tgl aktivasi</center>
								</th>
								<th>
									<center>Tgl non-aktif</center>
								</th>

								<th>
									<center>Action</center>
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($datalayananpelanggan as $key => $datas)
							<tr>
								<td>
									<center>{{++$key}}</center>
								</td>
								<td>{{ $datas->datapelanggan[0]->name }} {{ $datas->catatan_layanan }}</td>
								@if($datas->id_layanan != null)
								<td>{{ $datas->layanan[0]->nama_layanan }}</td>
								@else
								<td> </td>
								@endif
								@if($datas->id_tipe_bw != null)
								<td>{{ $datas->tipebw[0]->tipe_bw }}</td>
								@else
								<td>-</td>
								@endif
								<td>{{ $datas->lokasi_layanan }}</td>
								<td>{{ $datas->status_layanan_pelanggan }}</td>
								<td>{{ $datas->status_penagihan_layanan }}</td>
								@if($datas->tanggal_aktivasi_layanan != null)
								<td>{{ date('d-M-Y',strtotime($datas->tanggal_aktivasi_layanan)) }}</td>
								@else
								<td></td>
								@endif
								<td>
									@if( $datas->status_layanan_pelanggan == "Non Aktif")

									<button type="button" class="btn btn-default btn-sm" data-toggle="modal"
									data-target="#formputus{{ $datas->user_id }}">
									{{ date('d-M-Y',strtotime($datas->tanggal_nonaktif_layanan)) }}
								</button>



								@else
								-
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
						<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
						data-target="#pemutusan{{ $datas->user_id }}">
						Pemutusan
					</button>

				</td>

			</tr>

			<div class="modal fade" id="formputus{{ $datas->user_id }}">
				<div class="modal-dialog modal-l">
					<div class="modal-content">
						<div class="modal-header bg-default">
							<h4 class="modal-title">Info Pemutusan Layanan Pelanggan <br> {{ $datas->datapelanggan[0]->nama_pelanggan }}
							</h4>
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
										src="{{ url('storage/berkas_pemutusan/'. $datas->berkas_pemutusan) }}"
										height="400" width="300">
									</div>
									<div class="form-group">
										<p><strong>Alasan penutusan</strong> : {{ $datas->alasan_pemutusan }} </p>
									</div>

								</div>
							</div>
						</div>
						<div class="modal-footer right-content-between">
							<button type="button" class="btn btn-default btn-sm"
							data-dismiss="modal">Close
						</button>
					</div>
				</form>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>




	<div class="modal fade" id="edit{{ $datas->user_id }}">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<h4 class="modal-title">Edit Data Layanan
						Pelanggan {{ $datas->datapelanggan[0]->nama_pelanggan }}</h4>
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
								<label>Catatan Layanan :</label>
								<input type="text" class="form-control" name="catatan_layanan">
							</div>

							<div class="form-group">
								<label>Tipe Bandwith :</label>
								<select name="id_tipe_bw" class="form-control select2"
								style="width: 100%;">
								<option value="">Pilih Tipe Bandwith</option>
								@foreach($datatipebw as $data)
								@if($data->id_tipe_bw == $datas->id_tipe_bw)
								<option value="{{ $data->id_tipe_bw }}"
									selected="true">{{ $data->tipe_bw }}</option>
									@else
									<option
									value="{{ $data->id_tipe_bw }}">{{ $data->tipe_bw }}</option>
									@endif
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Status Penagihan Layanan</label>
								<input type="hidden" name="status_penagihan" value="all">
								<select name="status_penagihan_layanan"
								class="form-control select2">
								@if($datas->status_penagihan_layanan == 'Berbayar')
								<option value="Berbayar" selected="true">
									Berbayar
								</option>
								<option value="Free">Free</option>
								@elseif($datas->status_penagihan_layanan == 'Free')
								<option value="Berbayar">Berbayar</option>
								<option value="Free" selected="true">Free
								</option>
								@else
								<option value="" selected="true">Pilih Penagihan</option>
								<option value="Berbayar">Berbayar</option>
								<option value="Free" >Free
								</option>
								@endif
							</select>
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
							
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Lokasi Layanan :</label>
								<input type="text" class="form-control" name="lokasi_layanan" value="{{ $datas->lokasi_layanan }}">
							</div>
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
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default"
						data-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-warning">Edit</button>
				</div>
			</div>
		</form>
	</div>
</div>
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
				<p> Apakah anda yakin ingin menghapus <b>
					@if($datas->id_layanan != null)
					{{ $datas->layanan[0]->nama_layanan }}
					@endif
				</b>
				milik {{ $datas->datapelanggan[0]->nama_pelanggan }}? </p>
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



<div class="modal fade" id="pemutusan{{ $datas->user_id }}">
	<div class="modal-dialog modal-l">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title">Pemutusan Layanan Pelanggan <br>
					<strong>{{ $datas->datapelanggan[0]->nama_pelanggan }}</strong></h4>
					<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form
			action="{{ url('data_layanan_pelanggan/berhenti/'.$datas->user_id.'/'.$datas->id_pelanggan) }}"
			method="post" role="form" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="row col-lg-12">
					<div class="col-lg-12">

						<div class="form-group">
							<label>Status Layanan Pelanggan</label>
							<input type="text" name="status_layanan_pelanggan" value="Non Aktif" class="form-control"
							disabled="">
						</div>

								<!-- <div class="form-group">
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
							</div> -->

							<div class="form-group">
								<label>Tanggal Pemutusan</label>

								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
									</div>
									<input type="text" class="form-control tanggal" name="tanggal_nonaktif_layanan">
								</div>

							</div>
							<div class="form-group">
								<label>Alasan pemutusan</label>
								<textarea class="form-control" name="alasan_pemutusan">

								</textarea>
							</div>
							<input type="hidden" name="berkas_pemutusan">
							<div class="form-group">
								<label for="exampleInputFile">Berkas pemutusan</label><br>
								<input type="file" name="berkas_pemutusan">
							</div>

						</div>
					</div>
					<div class="modal-footer right-content-between">
						<button type="button" class="btn btn-default"
						data-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-info">Putus</button>
				</div>
			</form>
		</div>
	</div>
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
