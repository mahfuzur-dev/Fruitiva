<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    function customer_login(){
        return view('frontend.customer_login');
    }
    function customer_login_store(Request $request){
        if(Auth::guard('customerlogin')->attempt(['email'=>$request->email,'password'=>$request->password])){
           if(Auth::guard('customerlogin')->user()->email_verified_at == null){
                Auth::guard('customerlogin')->logout();
                 return redirect()->route('customer.login')->with('verify_email','Please Verify Email!');
           }
            return redirect('/');
           
        }
        else{
            return redirect()->route('customer.login');
        }
    }
    function customer_logout(){
        Auth::guard('customerlogin')->logout();
        return redirect()->route('customer.login');
    }
}
