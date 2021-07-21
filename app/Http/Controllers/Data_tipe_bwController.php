<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_tipe_bw;


class Data_tipe_bwController extends Controller
{
 
    public function index(){

    	$data = Data_tipe_bw::all();
        return view ('master/data_tipe_bw',['datatipebandwith' => $data]);
    }

    public function create(Request $request)
    { 
      
        Data_tipe_bw::create([
            'tipe_bw' => $request['tipe_bw'],
            
        ]);
        
        return redirect('data_tipe_bw');
    }
    public function edit(Request $request,$id)
    { 

        $datatipebandwith = Data_tipe_bw::where('id_tipe_bw','=',$id);

        $datatipebandwith->update([
            'tipe_bw' => $request['tipe_bw'],
            
        ]);
        return redirect('data_tipe_bw');
    }
    public function hapus($id)
    {
        $datatipebandwith = Data_tipe_bw::where('id_tipe_bw','=',$id);

        $datatipebandwith->delete();

        return redirect('data_tipe_bw');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}