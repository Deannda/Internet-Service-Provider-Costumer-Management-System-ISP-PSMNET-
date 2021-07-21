<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_layanan;


class Data_layananController extends Controller
{
 
    public function index(){

    	$data = Data_layanan::all();
        return view ('master/data_layanan',['datalayanan' => $data]);
    }

    public function create(Request $request)
    { 
      
        Data_layanan::create([
            'nama_layanan' => $request['nama_layanan'],
            'harga_layanan' => $request['harga_layanan'],
            'layanan_prorate' => $request['layanan_prorate']
            
        ]);
        
        return redirect('data_layanan');
    }
    public function edit(Request $request,$id)
    { 

        $datalayanan = Data_layanan::where('id_layanan','=',$id);

        $datalayanan->update([
            'nama_layanan' => $request['nama_layanan'],
            'harga_layanan' => $request['harga_layanan'],
            'layanan_prorate' => $request['layanan_prorate']
            
        ]);
        return redirect('data_layanan');
    }
    public function hapus($id)
    {
        $datalayanan = Data_layanan::where('id_layanan','=',$id);

        $datalayanan->delete();

        return redirect('data_layanan');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}