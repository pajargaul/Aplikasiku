<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NelayanController extends Controller
{
    public function index()
    {
        return view('nelayan.nelayan_login');
    }

    public function Login(Request $request){
        $check= $request->all();
        if (Auth::guard('nelayan')->attempt(['email'=> $check['email'], 'password'=>  $check['password']])) {
            return redirect()->route('nelayan.dashboard')->with('status', 'admin login succesfully');
        }else{
            return back()->with('status', 'invalid email or password');
        }
        }

        public function Dashboard(){
            return view('nelayan.index');
        }
        public function nelayanLogout(){
            Auth::guard('nelayan')->logout();
            return redirect()->route('nelayan.login_form')->with('error', 'nelayan logout succesfully');
        }

        public function sewakanalat(){
            return view('nelayan.sewakanalat');
        }

        public function storesewaalat(Request $request){
            
        }
}
