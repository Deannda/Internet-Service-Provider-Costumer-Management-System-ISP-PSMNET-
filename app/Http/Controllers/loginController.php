<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class loginController extends Controller
{
    public function index()
    {
    	return view ('login');
    }

    public function checklogin(Request $request)
    {

    	
    	if(Auth::attempt($request->only('username','password')))
    	{
    	    $user = User::where('id','=',\auth()->user()->id)->get();
//    	    return $user;

             if (\auth()->user()->level == 'Admin'){
                return redirect('page_dashboard');
            } 
             
            } else {
            return back()->with('error', 'Login Gagal! Periksa Kembali Username dan Password Anda');
                // return redirect()->route('adminweb')->with('error', 'Login Gagal! Periksa Kembali Username dan Password Anda');
                // return redirect('adminweb');
            
    	   
            // return back()->with('error', 'Login Gagal! Periksa Kembali Username dan Password Anda');
                // return redirect()->route('adminweb')->with('error', 'Login Gagal! Periksa Kembali Username dan Password Anda');
                // return view('page_dashboard');
            }
        	}
    




    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    //  public function editpassword(Request $request, $id)
    //  {
       
    //     $validatedData = $request->validate([
    //        'password_baru' => 'required|string|min:6',
    //     ]);

    //     //Change Password
    //     $user = User::where('id','=',$id);
    //     $user->update([
    //         'password'=> bcrypt($request['password_baru']),
    //     ]);
        

    //      if(auth()->user()->keterangan == 'admin'){
    //         return view('admin/dashboard',['successPassword' => 'Password berhasil di perbarui']);
    //      }else{
    //         return view('admindesa/statistik',['successPassword' => 'Password berhasil di perbarui']);
    //      }


    // }

}
