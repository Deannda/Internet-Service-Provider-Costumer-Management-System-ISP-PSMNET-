<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_sektor;


class Data_sektorController extends Controller
{
 
    public function index(){

    	$data = Data_sektor::all();
        return view ('master/data_sektor',['datasektor' => $data]);
    }

    public function create(Request $request)
    { 
      
        Data_sektor::create([
            'nama_sektor' => $request['nama_sektor'],
            
        ]);
        
        return redirect('data_sektor');
    }
    public function edit(Request $request,$id)
    { 

        $datasektor = Data_sektor::where('id_sektor','=',$id);

        $datasektor->update([
            'nama_sektor' => $request['nama_sektor'],
            
        ]);
        return redirect('data_sektor');
    }
    public function hapus($id)
    {
        $datasektor = Data_sektor::where('id_sektor','=',$id);

        $datasektor->delete();

        return redirect('data_sektor');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}