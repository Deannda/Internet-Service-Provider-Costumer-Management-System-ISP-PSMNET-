<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dev_sewa;
use App\Dev_out;

class SomeController extends Controller
{
     public function index()
    {
        
    	$data = Dev_sewa::all();
    	return $data;
  
    }
       public function index2()
    {
        
    	$data = Dev_out::all();
    	return $data;
  
    }


}
