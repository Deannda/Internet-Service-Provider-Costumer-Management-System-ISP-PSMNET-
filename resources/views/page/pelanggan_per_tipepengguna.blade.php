@extends('../page/dashboard')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pelanggan Kategori {{ $tipe_pengguna }}</h1>
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
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Pelanggan</center></th>
             
                
              </tr>
            </thead>
            <tbody>
        
             @foreach($data as $no => $datas)
             <tr>
              <td><center>{{ ++$no }}</center></td>
              <td>{{ $datas->name }}</td>
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
</div>



<!-- /.modal -->

<!-- /.row -->
</section>
@endsection


