<?php

namespace App\Http\Controllers;

use App\Models\Customerlogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    function redirect_provider(){
       return Socialite::driver('facebook')->redirect();
    }
    function provider_to_application(){
       $user = Socialite::driver('facebook')->user();

       if(Customerlogin::where('email',$user->getEmail())->exists()){
            if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(),'password'=>'abc123.@'])){
                return redirect('/');
            }
       }
       else{
            Customerlogin::insert([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'password'=>bcrypt('abc123.@'),
                'created_at'=>Carbon::now(),
            ]);
            if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(),'password'=>'abc123.@'])){
                return redirect('/');
            }
       }
    }
}
