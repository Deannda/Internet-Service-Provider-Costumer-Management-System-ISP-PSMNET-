<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing_isu;

class Billing_IsuController extends Controller
{
 
    public function index(){

    	$data = Billing_isu::all();
    	
        return view ('master/billing_isu',['billingisu' => $data]);
    }

    public function create(Request $request)
    { 
      
        Billing_isu::create([
            'billing_isu' => $request['billingisu'],
            
        ]);
        
        return redirect('billing_isu');
    }
    public function edit(Request $request,$id)
    { 

        $updatebillingisu = Billing_isu::where('id_billing_isu','=',$id);

        $updatebillingisu->update([
            'billing_isu' => $request['billingisu'],
            
        ]);
        return redirect('billing_isu');
    }
    public function hapus($id)
    {
        $hapusbillingisu = Billing_isu::where('id_billing_isu','=',$id);

        $hapusbillingisu->delete();

        return redirect('billing_isu');
    }
    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}
