<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_tagihan;

class Tagihan_lunasController extends Controller
{
       public function index(){

       	$data = Data_tagihan::whereMonth('tanggal_tagihan', date('m'))->where('status_tagihan','lunas')->with('layanan','pelanggan')->get();


        return view ('penagihan/tagihan_lunas',['data' => $data]);
    }
}
