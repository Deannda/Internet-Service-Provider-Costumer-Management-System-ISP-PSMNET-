<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('check-connection', function () {
//     $users = DB::table("users")->get();
//     dd($users);
// });

Route::get('createStorage', function(){
   return Artisan::call('storage:link');
});

Route::get('/', 'loginController@index')->name('login');
Route::get('/logout', 'loginController@logout')->name('logout');
Route::post('/login/checklogin', 'loginController@checklogin');


Route::get('check-connection-2', function () {
	$pelanggan = DB::connection("mysql2")->table("ost_user__cdata")->get();
	dd($pelanggan);
});

Route::get('/tes1', 'SomeController@index');
Route::get('/tes2', 'SomeController@index2');




Route::get('/dashboard_isp_psmnet', 'DashboardController@dashboard');

Route::get('/data_pelanggan_pop/{id_pop}', 'DashboardController@pelanggan_per_pop');

Route::get('/data_pelanggan_layanan/{id_layanan}', 'DashboardController@pelanggan_per_layanan');

Route::get('/data_pelanggan_kategori/{id_kategori}', 'DashboardController@pelanggan_per_kategori');

Route::get('/data_pelanggan_tipe_pengguna/{id_tipe_pengguna}', 'DashboardController@pelanggan_per_tipepengguna');

Route::get('/data_pelanggan_sektor/{id_sektor}', 'DashboardController@pelanggan_per_sektor');

Route::get('/pelanggan_aktif', 'DashboardController@pelanggan_aktif');

Route::get('/pelanggan_non_aktif', 'DashboardController@pelanggan_nonaktif');

Route::get('/pelanggan_suspend', 'DashboardController@pelanggansuspend');

Route::get('/data_pelanggan_putus/{id}', 'DashboardController@pelanggan_putus');

Route::get('/data_barang', 'Data_barangController@index');


Route::get('/data_pop', 'Data_popController@index');
Route::post('/pop/create', 'Data_popController@create');
Route::post('/pop/edit/{id}', 'Data_popController@edit');
Route::get('/pop/hapus/{id}', 'Data_popController@hapus');

Route::get('/data_kategori', 'Data_kategoriController@index');
Route::post('/kategori/create', 'Data_kategoriController@create');
Route::post('/kategori/edit/{id}', 'Data_kategoriController@edit');
Route::get('/kategori/hapus/{id}', 'Data_kategoriController@hapus');

Route::get('/data_tipe_pengguna', 'Data_tipe_penggunaController@index');
Route::post('/data_tipe_pengguna/create', 'Data_tipe_penggunaController@create');
Route::post('/data_tipe_pengguna/edit/{id}', 'Data_tipe_penggunaController@edit');
Route::get('/data_tipe_pengguna/hapus/{id}', 'Data_tipe_penggunaController@hapus');

Route::get('/data_layanan', 'Data_layananController@index');
Route::post('/data_layanan/create', 'Data_layananController@create');
Route::post('/data_layanan/edit/{id}', 'Data_layananController@edit');
Route::get('/data_layanan/hapus/{id}', 'Data_layananController@hapus');

Route::get('/data_tipe_bw', 'Data_tipe_bwController@index');
Route::post('/data_tipe_bw/create', 'Data_tipe_bwController@create');
Route::post('/data_tipe_bw/edit/{id}', 'Data_tipe_bwController@edit');
Route::get('/data_tipe_bw/hapus/{id}', 'Data_tipe_bwController@hapus');

Route::get('/data_zona', 'Data_zonaController@index');
Route::post('/data_zona/create', 'Data_zonaController@create');
Route::post('/data_zona/edit/{id}', 'Data_zonaController@edit');
Route::get('/data_zona/hapus/{id}', 'Data_zonaController@hapus');

Route::get('/data_harga_perzona', 'Data_harga_perzonaController@index');
Route::post('/data_harga_perzona/create', 'Data_harga_perzonaController@create');
Route::post('/data_harga_perzona/edit/{id}', 'Data_harga_perzonaController@edit');
Route::get('/data_harga_perzona/hapus/{id}', 'Data_harga_perzonaController@hapus');


Route::get('/data_sektor', 'Data_sektorController@index');
Route::post('/data_sektor/create', 'Data_sektorController@create');
Route::post('/data_sektor/edit/{id}', 'Data_sektorController@edit');
Route::get('/data_sektor/hapus/{id}', 'Data_sektorController@hapus');

Route::get('/billing_isu', 'Billing_IsuController@index');
Route::post('/billing_isu/create', 'Billing_IsuController@create');
Route::post('/billing_isu/edit/{id}', 'Billing_IsuController@edit');
Route::get('/billing_isu/hapus/{id}', 'Billing_IsuController@hapus');

Route::get('/pelanggan_all', 'PelangganController@view_all');
Route::get('/tambah_pelanggan_all', 'PelangganController@tambah_pelanggan_all');
Route::post('/pelanggan_all/create', 'PelangganController@create_all');

Route::get('/pelanggan_berbayar', 'PelangganController@view_bayar');
Route::get('/tambah_pelanggan_berbayar', 'PelangganController@tambah_pelanggan_bayar');
Route::post('/pelanggan_berbayar/create', 'PelangganController@create');
Route::post('/pelanggan_berbayar/edit/{id}', 'PelangganController@edit');
Route::get('/riwayat_tagihan_pelanggan_berbayar', 'PelangganController@riwayat_tagihan');

Route::get('/pelanggan_free', 'PelangganController@view_free');
Route::get('/tambah_pelanggan_free', 'PelangganController@tambah_pelanggan_free');
Route::post('/pelanggan_free/create', 'PelangganController@create_free');
Route::post('/pelanggan_free/edit{id}', 'PelangganController@edit_free');


Route::post('/klasifikasi', 'PelangganController@klasifikasi');

Route::get('/data_layanan_pelanggan_all/{id}', 'Layanan_pelangganController@layanan_pelanggan_all');
Route::get('/tambah_layanan_pelanggan_all/{id}', 'Layanan_pelangganController@tambah_layanan_pelanggan_all');
Route::post('/tambah_layanan_pelanggan_all/create/{nopelanggan}', 'Layanan_pelangganController@create_layanan_pelanggan_all');



Route::get('/data_layanan_pelanggan_berbayar/{id}', 'Layanan_pelangganController@layanan_pelanggan_berbayar');
Route::get('/tambah_layanan_pelanggan_berbayar/{id}', 'Layanan_pelangganController@tambah_layanan_pelanggan_berbayar');
Route::post('/tambah_layanan_pelanggan_berbayar/create/{nopelanggan}', 'Layanan_pelangganController@create_layanan_pelanggan_berbayar');


Route::get('/data_layanan_pelanggan_free/{id}', 'Layanan_pelangganController@layanan_pelanggan_free');
Route::get('/tambah_layanan_pelanggan_free/{id}', 'Layanan_pelangganController@tambah_layanan_pelanggan_free');
Route::post('/tambah_layanan_pelanggan_free/create/{nopelanggan}', 'Layanan_pelangganController@create_layanan_pelanggan_free');


Route::get('/data_pelanggan/delete/{id}/{status}', 'PelangganController@delete');
Route::get('/data_layanan_pelanggan/delete/{id}/{idPelanggan}', 'Layanan_pelangganController@delete_layanan_pelanggan');
Route::post('/data_layanan_pelanggan/edit/{userid}/{idPelanggan}', 'Layanan_pelangganController@edit_layanan_pelanggan');
Route::post('/data_layanan_pelanggan/berhenti/{userid}/{idPelanggan}', 'Layanan_pelangganController@pemutusan_layanan');

Route::get('/penerbitan_tagihan', 'Penerbitan_tagihanController@index');
Route::get('/penerbitan_tagihan_saja', 'Penerbitan_tagihanController@terbitkan_saja');
Route::get('/invoice', 'InvoiceController@cetakinvoice');




Route::get('/tagihan_terbit', 'Tagihan_terbitController@index');
Route::get('/data_tagihan_lunas/lunas/{id}', 'Tagihan_terbitController@lunas');
Route::post('/data_tagihan_suspend/suspend/{id}', 'Tagihan_terbitController@suspend');


Route::get('/tagihan_lunas', 'Tagihan_lunasController@index');


Route::get('/tagihan_belum_lunas', 'Tagihan_belum_lunasController@index');
Route::get('/invoicesuspend', 'Tagihan_belum_lunasController@invoice_suspend');



Route::get('/tagihan_jatuh_tempo', 'Tagihan_jatuh_tempoController@index');

Route::get('/tagihan_prorate', 'Tagihan_prorateController@index');


Route::get('/history_layanan_pelanggan/{id}', 'Layanan_pelangganController@history_layanan');


