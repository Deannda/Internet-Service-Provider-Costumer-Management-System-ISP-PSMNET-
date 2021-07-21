<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_tipe_pengguna;


class Data_tipe_penggunaController extends Controller
{
 
    public function index(){

    	$data = Data_tipe_pengguna::all();
        return view ('master/data_tipe',['datatipepengguna' => $data]);
    }

    public function create(Request $request)
    { 
      
        Data_tipe_pengguna::create([
            'tipe_pengguna' => $request['tipe_pengguna'],
            
        ]);
        
        return redirect('data_tipe_pengguna');
    }
    public function edit(Request $request,$id)
    { 

        $datatipepengguna = Data_tipe_pengguna::where('id_tipe_pengguna','=',$id);

        $datatipepengguna->update([
            'tipe_pengguna' => $request['tipe_pengguna'],
            
        ]);
        return redirect('data_tipe_pengguna');
    }
    public function hapus($id)
    {
        $datatipepengguna = Data_tipe_pengguna::where('id_tipe_pengguna','=',$id);

        $datatipepengguna->delete();

        return redirect('data_tipe_pengguna');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}