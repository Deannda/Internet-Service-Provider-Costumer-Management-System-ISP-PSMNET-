<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Data_layanan_pelanggan;
use App\Data_layanan;
use App\Data_kategori;
use App\Data_pop;
use App\Data_sektor;
use App\Data_tipe_pengguna;
use App\Data_pelanggan;
use App\SomeModel;
use App\Ost_user__cdata;
use App\Ost_user;
use App\Ost_user_email;
use App\Data_tagihan;


class DashboardController extends Controller
{
	
	public function dashboard()
	{

		$layanan = Data_layanan::all();
		$kategori = Data_kategori::all();
		$pop = Data_pop::all();
		$sektor = Data_sektor::all();
		$tipe = Data_tipe_pengguna::all();
		$datapelanggan = Ost_user::where('status_pelanggan', 'Aktif')->with('datalayanan', 'kategoripelanggan', 'datasektor', 'tipepengguna')->orderBy('created','desc')->limit(10)->get();

		$aktif = Ost_user::where('status_pelanggan','Aktif')->get();
		$nonaktif = Ost_user::where('status_pelanggan','Non Aktif')->get();
		$suspend = Data_tagihan::where('status_tagihan','suspend')->get();
		$nonlayanan = Ost_user__cdata::where('status_layanan_pelanggan','Non Aktif')->with('datapelanggan','layanan')->limit(10)->get();

		// return $datapelanggan;

        //POP Pelanggan
		$dataPOP = [];
		foreach ($pop as $key => $POPvalue) {
        	# code...
			$jmlperPOP = Ost_user__cdata::where('id_pop',$POPvalue->id_pop)->count();

			array_push($dataPOP, array('id_pop' => $POPvalue->id_pop,'nama_pop' => $POPvalue->nama_pop, 'jumlah_pop' => $jmlperPOP));

		}

        //Layanan Pelanggan
		$dataLayanan = [];
		foreach ($layanan as $key => $Layananvalue) {
        	# code...
			$jmlperLayanan = Ost_user__cdata::where('id_layanan',$Layananvalue->id_layanan)->count();

			array_push($dataLayanan, array('id_layanan'  => $Layananvalue->id_layanan,'nama_layanan' => $Layananvalue->nama_layanan, 'jumlah_layanan' => $jmlperLayanan));

		}


        //Kategori Pelanggan
		$datakategori = [];
		foreach ($kategori as $key => $kategorivalue) {
        	# code...
			$jmlperkategori = Ost_user::where('kategori_pelanggan',$kategorivalue->id_kategori)->count();

			array_push($datakategori, array('id_kategori'=> $kategorivalue->id_kategori,'nama_kategori' => $kategorivalue->nama_kategori, 'jumlah_kategori' => $jmlperkategori));

		}


		$datatipe_pengguna = [];
		foreach ($tipe as $key => $tipe_penggunavalue) {
        	# code...
			$jmlpertipe_pengguna = Ost_user::where('tipe_pengguna',$tipe_penggunavalue->id_tipe_pengguna)->count();

			array_push($datatipe_pengguna, array('id_tipe_pengguna'=>$tipe_penggunavalue->id_tipe_pengguna,'nama_tipe_pengguna' => $tipe_penggunavalue->tipe_pengguna, 'jumlah_tipe_pengguna' => $jmlpertipe_pengguna));

		}


		$datasektor = [];
		foreach ($sektor as $key => $sektorvalue) {
        	# code...
			$jmlpersektor = Ost_user::where('nama_sektor',$sektorvalue->id_sektor)->count();

			array_push($datasektor, array('id_sektor'=>$sektorvalue->id_sektor,'nama_sektor' => $sektorvalue->nama_sektor, 'jumlah_sektor' => $jmlpersektor));

		}


		$datapelanggannn =  Ost_user::count();
		
        // return $dataPOP;

	

		return view('page/page_dashboard', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe, 'datapelanggan' => $datapelanggan,'request' => null,'aktif' => $aktif, 'nonaktif' => $nonaktif, 'suspend' => $suspend, 'data_pop' => $dataPOP, 'data_layanan' => $dataLayanan, 'data_kategori' => $datakategori,'data_tipe_pengguna' => $datatipe_pengguna, 'data_sektor' => $datasektor, 'nonlayanan' => $nonlayanan, 'countpelanggan' => $datapelanggannn]);
	}

	public function pelanggan_per_pop ($id)
	{
		$pop = Data_pop::where('id_pop',$id)->first();

		$Pelanggan = Ost_user__cdata::where('id_pop',$id)->with('datapelanggan')->get();
		return view ('page/pelanggan_per_pop',['data' => $Pelanggan, 'nama_pop' => $pop->nama_pop]);

	}

	public function pelanggan_per_layanan ($id)
	{
		$layanan = Data_layanan::where('id_layanan',$id)->first();

		
		$Pelanggan = Ost_user__cdata::where('id_layanan',$id)->with('datapelanggan')->get();
		return view ('page/pelanggan_per_layanan',['data' => $Pelanggan, 'nama_layanan' => $layanan->nama_layanan]);

	}

	public function pelanggan_per_kategori ($id)
	{
		$kategori = Data_kategori::where('id_kategori',$id)->first();

		
		$Pelanggan = Ost_user::where('kategori_pelanggan',$id)->get();
		return view ('page/pelanggan_per_kategori',['data' => $Pelanggan, 'nama_kategori' => $kategori->nama_kategori]);

	}

	public function pelanggan_per_tipepengguna ($id)
	{
		$tipe = Data_tipe_pengguna::where('id_tipe_pengguna',$id)->first();

		
		$Pelanggan = Ost_user::where('tipe_pengguna',$id)->get();
		return view ('page/pelanggan_per_tipepengguna',['data' => $Pelanggan, 'tipe_pengguna' => $tipe->tipe_pengguna]);

	}

	public function pelanggan_per_sektor ($id)
	{
		$sektor = Data_sektor::where('id_sektor',$id)->first();

		
		$Pelanggan = Ost_user::where('nama_sektor',$id)->get();
		return view ('page/pelanggan_per_sektor',['data' => $Pelanggan, 'nama_sektor' => $sektor->nama_sektor]);

	}

	public function pelanggan_aktif ()
	{

		$Pelanggan = Ost_user::where('status_pelanggan', 'Aktif')->get();
		
		return view ('page/pelanggan_aktif',['data' => $Pelanggan]);

	}


	public function pelanggan_nonaktif ()
	{

		$Pelanggan = Ost_user::where('status_pelanggan', 'Non Aktif')->get();
		
		return view ('page/pelanggan_aktif',['data' => $Pelanggan]);

	}

	public function pelanggansuspend()

	{

		$suspend = Data_tagihan::where('status_tagihan','suspend')->with('pelanggan')->get();
		
		return view ('page/pelanggan_suspend',['data' => $suspend]);

	}

	// public function pelanggan_putus($id)

	// {
	// 	$layanan = Data_layanan::all();
	// 	$pop = Data_pop::all();
	// 	$data = Ost_user__cdata::where('id_pelanggan', $id)->with('layanan', 'datapelanggan', 'devout', 'devsewa')->get();

	// 	return view ('pelanggan/data_layanan_pelanggan_all', ['datalayananpelanggan' => $data, 'datalayanan' => $layanan, 'pop' => $pop, 'nopelanggan' => $id]);

	// }

}
