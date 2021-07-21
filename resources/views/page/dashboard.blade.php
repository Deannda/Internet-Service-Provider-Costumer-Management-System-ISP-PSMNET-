<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISP PSMNET</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  @yield('css')
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
         <!--  <a class="nav-link" href="#" data-toggle="modal" data-target="#editpassword">Edit password </a> -->
       </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ url('logout') }}">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <div class="modal fade" id="editpassword">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light"><strong>ISP</strong></span>
      <img src="/adminlte/dist/img/psmnet.png"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: .9">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{--          <img src="/adminlte/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">--}}
        </div>

        <div class="info">
          <a href="#" class="d-block">Admin <i>PSMNET</i></a>
        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <!-- SUPER ADMIN -->
           <li class="nav-item">
            <a href="{{ url('dashboard_isp_psmnet') }}" class="nav-link {{ (request()->is('pengguna*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- Datamaster -->

          <li class="nav-item has-treeview  {{ (request()->is('data_barang*') || request()->is('data_pop*') || request()->is('data_kategori*') || request()->is('data_tipe_pengguna*') || request()->is('data_sektor*') || request()->is('data_layanan*')) ? 'menu-open' : '' }}">

            <a href="" class="nav-link  {{ (request()->is('data_barang*') || request()->is('data_pop*') || request()->is('data_kategori*') || request()->is('data_tipe_pengguna*') || request()->is('data_sektor*') || request()->is('data_layanan*')) ? 'active' : '' }} ">
             <i class="nav-icon fas fa-database"></i>
             <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
     <!--          <li class="nav-item">
                <a href="{{ url('data_barang') }}" class="nav-link  {{ (request()->is('data_barang*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{ url('data_pop') }}" class="nav-link  {{ (request()->is('data_pop*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data POP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data_kategori') }}" class="nav-link {{ (request()->is('data_kategori*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data_tipe_pengguna') }}" class="nav-link {{ (request()->is('data_tipe_pengguna*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tipe Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data_sektor') }}" class="nav-link {{ (request()->is('data_sektor*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Sektor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data_layanan') }}" class="nav-link {{ (request()->is('data_layanan*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data_tipe_bw') }}" class="nav-link {{ (request()->is('data_tipe_bw*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tipe Bandwith</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data_zona') }}" class="nav-link {{ (request()->is('data_zona*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Zona</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data_harga_perzona') }}" class="nav-link {{ (request()->is('data_harga_perzona*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Harga Per-zona</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="{{ url('billing_isu') }}" class="nav-link  {{ (request()->is('billing_isu*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Billing Isu</p>
                </a>
              </li> -->
            </ul>
          </li>


          <!-- <li class="nav-item has-treeview  {{ (request()->is('pelanggan_berbayar*') || request()->is('pelanggan_free*') || request()->is('pelanggan_all*')) ? 'menu-open' : '' }}">
            <a href="" class="nav-link  {{ (request()->is('pelanggan_berbayar*') || request()->is('pelanggan_free*') || request()->is('pelanggan_all*')) ? 'active' : '' }} ">
              <i class="nav-icon fas fa-users nav-icon"></i>
              <p>
                Data Pelanggan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> -->
            <!--    <ul class="nav nav-treeview"> -->
              <li class="nav-item">
                <a href="{{ url('pelanggan_all') }}" class="nav-link  {{ (request()->is('pelanggan_all*')) ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-users nav-icon"></i>
                  <p>Data Pelanggan</p>
                </a>
              </li>
<!--               <li class="nav-item">
                <a href="{{ url('pelanggan_berbayar') }}" class="nav-link {{ (request()->is('pelanggan_berbayar*')) ? 'active' : '' }} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pelanggan Berbayar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pelanggan_free') }}" class="nav-link {{ (request()->is('pelanggan_free*')) ? 'active' : '' }} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pelanggan Free</p>
                </a>
              </li>
            </ul>
          </li>
        -->
    <!--     <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              ACCURATE
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Penagihan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

               <li class="nav-item">
                <a href="tagihan_prorate" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Tagihan Prorate</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="penerbitan_tagihan" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Penerbitan Tagihan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tagihan_terbit" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Tagihan Terbit</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tagihan_lunas" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Tagihan Sudah Lunas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tagihan_belum_lunas" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Tagihan Belum Lunas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tagihan_jatuh_tempo" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Tagihan Jatuh Tempo</p>
                </a>
              </li>

            </ul>

          </li>
        </ul>

        <ul class="nav nav-treeview">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Kas & Bank
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          -->
<!--             <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Buku Bank</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Penerimaan</p>
                </a>
              </li>

            </ul>

          </li>
        </ul>


        <ul class="nav nav-treeview">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Penjualan
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>

           <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Penawaran Penjualan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Pesanan Penjualan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Pengiriman Pesanan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Faktur Penjualan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Retur Penjualan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Penerimaan Penjualan</p>
              </a>
            </li>

          </ul>

        </li>
      </ul>


      <ul class="nav nav-treeview">
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
             Pembelian
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>

         <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Permintaan Barang</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Pesanan Pembelian</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Penerimaan Barang</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Faktur Pembelian</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Retur Pembelian</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Pembayaran Pembelian</p>
            </a>
          </li>

        </ul>

      </li>
    </ul>








          </li>  --> <!--  tutup induk multilevel
        -->





  <!--       <li class="nav-item">
          <a href="{{ url('pengguna') }}" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Ticketing</p>
          </a>
        </li> -->

      </ul>
    </nav>
  </div>
</aside>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @yield('content')
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>@PSMNET</b>
  </div>
  <strong>Copyright &copy; 2020 <a href="http://citrainfomedia.net">PT. CITRA INFOMEDIA</a></strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('adminlte/dist/js/demo.js')}}"></script>

@yield('js')

</body>
</html>
