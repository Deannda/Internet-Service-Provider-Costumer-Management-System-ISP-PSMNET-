<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_tagihan;
use App\Billing_isu;

class Tagihan_terbitController extends Controller
{ 
	public function index(){

		$billingisu = Billing_isu::all();
		$data = Data_tagihan::whereMonth('tanggal_tagihan', date('m'))->where('status_tagihan','diterbitkan')->with('layanan','pelanggan')->get();
		return view ('penagihan/tagihan_terbit',['data' => $data, 'billingisue' => $billingisu]);
	}

	public function lunas($id){

	
		$data = Data_tagihan::where('id_tagihan', '=', $id)->where('status_tagihan','diterbitkan');

		$data->update([

			'status_tagihan' => 'lunas'
		]);

		return redirect('tagihan_terbit');
	}

	public function suspend(Request $request, $id){


		$data = Data_tagihan::where('id_tagihan', '=', $id)->where('status_tagihan','diterbitkan');

		$data->update([

			'status_tagihan' => 'suspend',
			'alasan_suspend' => $request['alasan_suspend']
		]);

		return redirect('tagihan_terbit');
	}
}
