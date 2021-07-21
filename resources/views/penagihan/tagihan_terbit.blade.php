@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Tagihan Terbit/di Cetak</h1>
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
								<td> {{ $tagihan->pelanggan[0]->nama_pelanggan }} </td>
								<td> {{ $tagihan->layanan[0]->layanan[0]->nama_layanan }} </td>
								<td> {{ $tagihan->layanan[0]->layanan[0]->harga_layanan }} </td>
								<td> {{ $tagihan->tanggal_tagihan }} </td>
								<td> {{ $tagihan->status_tagihan }} </td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lunas{{ $tagihan->id_tagihan }}">
										<strong>Lunas
										</strong>
									</button>         
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#suspend{{ $tagihan->id_tagihan }}">
										<strong>Suspend Tagihan</strong>
									</button>
								</td>
							</tr>
							
							<div class="modal fade" id="suspend{{ $tagihan->id_tagihan }}">
								<div class="modal-dialog">
									<div class="modal-content bg-danger">
										<div class="modal-header">
											<h4 class="modal-title-dark">Suspend Tagihan Pelanggan</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="{{ url('data_tagihan_suspend/suspend/'.$tagihan->id_tagihan) }}" method="post" role="form"
												enctype="multipart/form-data">
												@csrf
												<p> Apakah anda yakin ingin suspend tagihan <b></b>? </p>

												<div class="form-group">
													<label>Alasan Suspend Tagihan</label>
													<select name="alasan_suspend" class="form-control select2" style="width: 100%;">
														<option value="">Pilih alasan suspend</option>
														@foreach($billingisue as $datad)
														<option
														value="{{ $datad->id_billing_isu }}">{{ $datad->billing_isu }}</option>
														@endforeach
													</select>


												</div>
												<div class="modal-footer right-content-between">
													<button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
													<button type="submit" class="btn btn-outline-light">Suspend</button>
												</div>
											</div>
										</form>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
								</div>
						
							<div class="modal fade" id="lunas{{ $tagihan->id_tagihan }}">
								<div class="modal-dialog">
									<div class="modal-content bg-info">
										<div class="modal-header">
											<h4 class="modal-title-dark">Tagihan Pelanggan Lunas</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p> Apakah anda yakin tagihan pelanggan lunas <b></b>? </p>


										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
											<a href="{{ url('data_tagihan_lunas/lunas/'.$tagihan->id_tagihan) }}" type="button" class="btn btn-outline-light">lunas</a>
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