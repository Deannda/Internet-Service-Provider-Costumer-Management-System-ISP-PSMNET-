@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection


@section('content')


<section>
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
</section>
<!-- /.content-header -->

<!-- Main content --> 
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info">
					<h3>Total pelanggan internet PSMNET : {{ $countpelanggan }} </h3>
				</div>
				<!-- /.card-header -->
			</div>

		</div>

		<div class="col-6">
			<div class="card">
				<div class="card-header bg-info">
					<h3>Pelanggan Baru Bulan April</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
						<thead>
							<tr>
								<th>
									<center>No</center>
								</th>
								<th>
									<center>ID Pelanggan</center>
								</th>
								<th>
									<center>Nama Pelanggan</center>
								</th>
				<!-- 					<th>
										<center>Alamat Penagihan</center>
									</th> -->
								<!-- 	<th>
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
								</tr>
							</thead>
							<tbody>
								@foreach($datapelanggan as $key => $datas)
								<tr>
									<td>
										<center>{{ ++$key }}</center>
									</td>
									<td>
										<center>{{ $datas->id_pelanggan }}</center>
									</td>
									<td>{{ $datas->name }}</td>
									
									<td>

										@if(count($datas->datalayanan) != 0)
										@foreach($datas->datalayanan as $namaLayanan)
										@foreach($namaLayanan->layanan as $listNamaLayanan)
										<li><a href ="{{ url('data_layanan_pelanggan_all/'.$datas->id_pelanggan) }}">{{ $listNamaLayanan->nama_layanan }}</a>
										</li>
										@endforeach
										@endforeach
										@else
										Layanan Kosong
										@endif
									</td>

								</tr>
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
			<div class="col-6">
				<div class="card">
					<div class="card-header bg-info">
						<h3>Pelanggan Putus Bulan Juni</h3>
					</div>
					<!-- /.card-header -->
		<!-- 			<div class="card-body">
			<table class="table table-bordered table-hover"> -->

				<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
						<thead>
							<tr>
								<th>
									<center>No</center>
								</th>
								<th>
									<center>ID Pelanggan</center>
								</th>
								<th>
									<center>Nama Pelanggan</center>
								</th>

								<th>
									<center>Layanan</center>
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($nonlayanan as $key => $datas)
							<tr>

								<td>
									<center>{{ ++$key }}</center>
								</td>
								<td>
									<center>{{ $datas->id_pelanggan }}</center>
								</td>
								@if(count($datas->datapelanggan) != 0)
								<td>{{ $datas->datapelanggan[0]->name }}</td>
								@endif


								
								<td>
									@if(count($datas->layanan) != 0)	

									<a href ="{{ url('data_layanan_pelanggan_all/'.$datas->id_pelanggan) }}" style=”color:red”>{{ $datas->layanan[0]->nama_layanan }}</a>
									


									@else
									Layanan Kosong
									@endif

								</td>


							</tr>


							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->






			<!-- /.card-body -->
		</div>
	</div>




	<!-- /.modal -->

	<!-- /.row -->
</section>

<section class="content">

	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<!-- ./col -->
			<!-- <div class="col-lg-4 col-6"> -->
				<!-- small box -->
	<!-- 			<div class="small-box bg-success">
					<div class="inner">
						<h3>{{ count($aktif) }} Orang<sup style="font-size: 20px"></sup></h3>

						<p>Pelanggan Aktif</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
					<a href="{{ url('pelanggan_aktif') }}" class="small-box-footer">Klik <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div> -->
			<!-- ./col -->
			<!-- <div class="col-lg-4 col-6"> -->
				<!-- small box -->
				<!-- <div class="small-box bg-warning">
					<div class="inner">
						<h3>{{ count($suspend) }} Orang</h3>

						<p>Pelanggan Suspend</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
					<a href="{{ url('pelanggan_suspend') }}" class="small-box-footer">Klik <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div> -->
			<!-- ./col -->
			<!-- <div class="col-lg-4 col-6"> -->
				<!-- small box -->
<!-- 				<div class="small-box bg-danger">
					<div class="inner">
						<h3>{{ count($nonaktif) }} Orang</h3>

						<p>Pelanggan Non-Aktif</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
					<a href="{{ url('pelanggan_non_aktif') }}" class="small-box-footer">Klik <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div> -->
			<!-- ./col -->

			<div class="col-lg-6">
				<div class="card">
					<div class="card-header bg-info">
						<h3 class="card-title" align="center">Total Pelanggan per Sektor</h3>
						<div class="card-tools">
						<!-- 	<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-download"></i>
							</a>
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-bars"></i>
							</a> -->
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead>
								<tr>
									<th>No</th>
									<th>Sektor</th>
									<th>Total</th>

								</tr>
							</thead>
							<tbody>
								@foreach($data_sektor as $no => $datasektor)
								<tr>
									<td>
										{{ ++$no }}
									</td>
									<td>
										{{ $datasektor['nama_sektor'] }}
									</td>
									<td>
										<a href="{{ url('data_pelanggan_sektor/'.$datasektor['id_sektor']) }}" class="text-muted">
											{{ $datasektor['jumlah_sektor'] }}
										</a>
										
									</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

			<!-- 	<div class="card">
					<div class="card-header border-0">
						<h3 class="card-title"><strong>Total Pelanggan per Kategori</strong></h3>
						<div class="card-tools"> -->
							<!-- <a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-download"></i>
							</a>
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-bars"></i>
							</a> -->
						<!-- </div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead>
								<tr>
									<th>No</th>
									<th>Kategori</th>
									<th>Total</th>
									<th>More</th>
								</tr>
							</thead>
							<tbody> -->
							<!-- 	@foreach($data_kategori as $no => $datakategori)
								<tr>
									<td>
										{{ ++$no }}
									</td>
									<td>
										{{ $datakategori['nama_kategori'] }}
									</td>
									<td>
										{{ $datakategori['jumlah_kategori'] }}
									</td>
									<td>
										<a href="{{ url('data_pelanggan_kategori/'.$datakategori['id_kategori']) }}" class="text-muted">
											<i class="fas fa-search"></i>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div> -->

				<div class="card">
					<div class="card-header bg-info">
						<h3 class="card-title">Total Pelanggan per POP</h3>
						<div class="card-tools">
							<!-- <a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-download"></i>
							</a>
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-bars"></i>
							</a> -->
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead>
								<tr>
									<th>No</th>
									<th>POP</th>
									<th>Total</th>

								</tr>
							</thead>
							<tbody>
								@foreach($data_pop as $no => $dataPOP)
								<tr>
									<td>
										{{ ++$no }}
									</td>
									<td>
										{{ $dataPOP['nama_pop'] }}
									</td>
									<td>
										<a href="{{ url('data_pelanggan_pop/'.$dataPOP['id_pop']) }}" class="text-muted">
											{{ $dataPOP['jumlah_pop'] }}
										</a>
										
									</td>
									
								</tr>
								@endforeach
							</table>
						</div>
					</div>
					<!-- /.card -->


					<!-- /.card -->
				</div>





				<div class="col-lg-6">
					<div class="card">
						<div class="card-header bg-info">
							<h3 class="card-title">Total Pelanggan per Layanan</h3>
							<div class="card-tools">
							<!-- <a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-download"></i>
							</a>
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-bars"></i>
							</a> -->
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead>
								<tr>
									<th>No</th>
									<th>Layanan</th>
									<th>Total</th>

								</tr>
							</thead>
							<tbody>
								@foreach($data_layanan as $no => $datalayanan)
								<tr>
									<td>
										{{ ++$no }}
									</td>
									<td>
										{{ $datalayanan['nama_layanan'] }}
									</td>
									<td>
										<a href="{{ url('data_pelanggan_layanan/'.$datalayanan['id_layanan']) }}" class="text-muted">	{{ $datalayanan['jumlah_layanan'] }}
											
										</a>

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.card -->

				<div class="card"> 
					<div class="card-header bg-info">
						<h3 class="card-title">Total Pelanggan per Tipe Pengguna</h3>
						<div class="card-tools">
							<!-- <a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-download"></i>
							</a>
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-bars"></i>
							</a> -->
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead>
								<tr>
									<th>No</th>
									<th>Tipe Pengguna</th>
									<th>Total</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($data_tipe_pengguna as $no => $datatipe_pengguna)
								<tr>
									<td>
										{{ ++$no }}
									</td>
									<td>
										{{ $datatipe_pengguna['nama_tipe_pengguna'] }}
									</td>
									<td>
										<a href="{{ url('data_pelanggan_tipe_pengguna/'.$datatipe_pengguna['id_tipe_pengguna']) }}" class="text-muted">
											{{ $datatipe_pengguna['jumlah_tipe_pengguna'] }}
										</a>
										
									</td>
									
								</tr>
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
			"responsive": true,
		});
	});
</script>
@endsection
