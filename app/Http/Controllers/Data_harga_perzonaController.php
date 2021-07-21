<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_harga_perzona;
use App\Data_tipe_bw;
use App\Data_zona;

class Data_harga_perzonaController extends Controller
{

    public function index()

    {

    	
    
        $tipebandwith = Data_tipe_bw::all();
        $zonaa = Data_zona::all();
        $hargaperzona = Data_harga_perzona::with('tipebww','zona')->get();
        return view ('master/data_harga_perzona',['datahargaperzona' => $hargaperzona,'datatipebw' => $tipebandwith, 'dzona' => $zonaa, 'request' => null]);
    }

    public function create(Request $request)
    { 

        Data_harga_perzona::create([
            'id_tipe_bw' => $request['id_tipe_bw'],
            'zona_id' => $request['zona_id'],
            'nama_wilayah' => $request['nama_wilayah'],
            'harga' => $request['harga'],
            
        ]);
        
        return redirect('data_harga_perzona');
    }
    public function edit(Request $request,$id)
    { 

        $datahargaperzona = Data_harga_perzona::where('id_zona','=',$id);

        $datahargaperzona->update([
            'id_tipe_bw' => $request['id_tipe_bw'],
            'zona_id' => $request['zona_id'],
            'nama_wilayah' => $request['nama_wilayah'],
            'harga' => $request['harga'],
            
        ]);
        return redirect('data_harga_perzona');
    }
    public function hapus($id)
    {
        $datahargaperzona = Data_harga_perzona::where('id_zona','=',$id);

        $datahargaperzona->delete();

        return redirect('data_harga_perzona');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}