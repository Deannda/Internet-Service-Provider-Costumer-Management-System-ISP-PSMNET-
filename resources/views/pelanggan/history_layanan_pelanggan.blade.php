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
									<center>History Layanan</center>
								</th>
								<th>
									<center>Tanggal Update</center>
								</th>
							</tr>
						</thead>
						<tbody>

							@foreach($loglayanan as $key => $datas)
							<tr>
								<td>
									<center>{{ ++$key }}</center>
								</td>
								<td>{{ $datas->event }} {{ $datas->extra }}</td>
								<td>{{ $datas->created_at }}</td>

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
