<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_zona;


class Data_zonaController extends Controller
{
 
    public function index(){

    	$data = Data_zona::all();
        return view ('master/data_zona',['datazona' => $data]);
    }

    public function create(Request $request)
    { 
      
        Data_zona::create([
            'nama_wilayah' => $request['nama_wilayah'],
      
            
        ]);
        
        return redirect('data_zona');
    }
    public function edit(Request $request,$id)
    { 

        $datazona = Data_zona::where('zona_id','=',$id);

        $datazona->update([
            'nama_wilayah' => $request['nama_wilayah'],
       
            
        ]);
        return redirect('data_zona');
    }
    public function hapus($id)
    {
        $datazona = Data_zona::where('zona_id','=',$id);

        $datazona->delete();

        return redirect('data_zona');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}