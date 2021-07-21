<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_pop;


class Data_popController extends Controller
{
 
    public function index(){

    	$data = Data_pop::all();
        return view ('master/data_pop',['datapop' => $data]);
    }

    public function create(Request $request)
    { 
      
        Data_pop::create([
            'nama_pop' => $request['pop'],
            
        ]);
        
        return redirect('data_pop');
    }
    public function edit(Request $request,$id)
    { 

        $datapop = Data_pop::where('id_pop','=',$id);

        $datapop->update([
            'nama_pop' => $request['pop'],
            
        ]);
        return redirect('data_pop');
    }
    public function hapus($id)
    {
        $datapop = Data_pop::where('id_pop','=',$id);

        $datapop->delete();

        return redirect('data_pop');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}