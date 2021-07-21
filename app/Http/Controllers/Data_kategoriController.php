<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_kategori;


class Data_kategoriController extends Controller
{
 
    public function index(){

    	$data = Data_kategori::all();
        return view ('master/data_kategori',['datakategori' => $data]);
    }

    public function create(Request $request)
    { 
      
        Data_kategori::create([
            'nama_kategori' => $request['kategori'],
            
        ]);
        
        return redirect('data_kategori');
    }
    public function edit(Request $request,$id)
    { 

        $datakategori = Data_kategori::where('id_kategori','=',$id);

        $datakategori->update([
            'nama_kategori' => $request['kategori'],
            
        ]);
        return redirect('data_kategori');
    }
    public function hapus($id)
    {
        $datakategori = Data_kategori::where('id_kategori','=',$id);

        $datakategori->delete();

        return redirect('data_kategori');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}