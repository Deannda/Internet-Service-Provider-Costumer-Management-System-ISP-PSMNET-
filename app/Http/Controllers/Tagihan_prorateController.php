<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ost_user__cdata;
use App\Data_pelanggan;
use App\Data_tagihan;
use App\Data_sektor;
use PDF;

class Tagihan_prorateController extends Controller
{
	public function index(){

		$data = [];
		$listPelanggan = Data_pelanggan::with('datalayanan', 'kategoripelanggan', 'datapop', 'datasektor', 'tipepengguna')->get();

		foreach ($listPelanggan as $data) {

			$layananPelanggan = Ost_user__cdata::where('id_pelanggan', $data->id_pelanggan)->get();
			$list = [];
			foreach ($layananPelanggan as $key => $lp) {
				$jmlBulan = date_diff(date_create('2020-11-2'),date_create(date('Y-m-d')))->format('%a');
				// return $jmlBulan;
				$datalayanan = Data_layanan::where('layanan_prorate','Prorate')->get();

				foreach($datalayanan as $prorate){

				}

				$cekData = Data_tagihan::where('user_id',$lp->user_id)->whereMonth('tanggal_tagihan',date('m'))->whereYear('tanggal_tagihan',date('Y'))->first();


				if (is_null($cekData)) {

					if (($lp->status_penagihan_layanan == 'Berbayar') && ($lp->status_layanan_pelanggan == 'Aktif')) {

						if (!in_array($data->id_pelanggan, $list)) {
                            # code...
							array_push($list, $data->id_pelanggan);
							array_push($pelanggan, $data);
						}

					}

				}

			}

			return view ('penagihan/tagihan_prorate');
		}

	}