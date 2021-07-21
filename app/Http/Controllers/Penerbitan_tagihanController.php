<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_pelanggan;
use App\Ost_user__cdata;
use App\Data_tagihan;

class Penerbitan_tagihanController extends Controller
{

  public function index(){

   $pelanggan = [];
   if(date('d') < '31'){

     $listPelanggan = Data_pelanggan::with('datalayanan', 'kategoripelanggan', 'datapop', 'datasektor', 'tipepengguna')->get();

     foreach ($listPelanggan as $data) {
      $layananPelanggan = Ost_user__cdata::where('id_pelanggan', $data->id_pelanggan)->get();

      $list = [];
      foreach ($layananPelanggan as $key => $lp) {
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

  }
}
return view ('penagihan/penerbitan_tagihan',['data' => $pelanggan]);
}

public function terbitkan_saja(Request $request){

  foreach ($request->id_layanan as $key => $value) {
      $dataLayanan = Ost_user__cdata::where('user_id', $value)->with('datapelanggan','layanan')->first();

    $cekData = Data_tagihan::where('user_id',$value)->whereMonth('tanggal_tagihan',date('m'))->whereYear('tanggal_tagihan',date('Y'))->first();
    if (is_null($cekData)) {
        # code...
      Data_tagihan::create([
        'id_pelanggan' => $dataLayanan->id_pelanggan,
        'user_id' => $value,
        'tanggal_tagihan' => date('Y-m-d') ,
        'status_tagihan' => 'diterbitkan'
      ]);     }

    }

    return redirect ('penerbitan_tagihan');
  }

}


