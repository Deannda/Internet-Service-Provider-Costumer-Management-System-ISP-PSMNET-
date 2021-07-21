<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Data_barangController extends Controller
{
 
    public function index(){

        return view ('master/data_barang');
    }
}