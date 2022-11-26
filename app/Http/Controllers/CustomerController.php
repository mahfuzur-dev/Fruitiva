<?php

namespace App\Http\Controllers;

use App\Models\CustomerEmailVerify;
use App\Models\Customerlogin;
use App\Models\CustomerPasswordReset;
use App\Models\OrderProduct;
use App\Notifications\CustomerPasswordResetNotification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function invoice($order_id){
        $pdf = Pdf::loadView('invoice.customerinvoice',[
            'order_id'=>$order_id,
        ]);
        return $pdf->download('invoice.pdf');

    }
    function review(Request $request){
        OrderProduct::where('customer_id',Auth::guard('customerlogin')->id())->where('product_id',$request->product_id)->update([
            'review'=>$request->review,
            'star'=>$request->star,
        ]);
        return back();
    }
    function password_reset_request_form(){
        return view('frontend.password_reset');
    }
    function pass_reset_send(Request $request){
        $customer = Customerlogin::where('email',$request->email)->firstOrFail();
        CustomerPasswordReset::where('customer_id',$customer->id)->delete();
        $pass_reset = CustomerPasswordReset::create([
            'customer_id'=>$customer->id,
            'reset_token'=>uniqid(),
            'created_at'=>Carbon::now(),
        ]);
        Notification::send($customer, new CustomerPasswordResetNotification($pass_reset));
        return back();
    }
    function pass_reset_form($reset_token){
        return view('password_reset.pass_reset_form',[
            'data'=>$reset_token,
        ]);
    }
    function customer_reset_password(Request $request){
        $customer_token = CustomerPasswordReset::where('reset_token',$request->reset_token)->firstOrFail();
        $customer = Customerlogin::findOrFail($customer_token->customer_id);
        $customer->update([
            'password'=>Hash::make($request->password),
        ]);
        $customer_token->delete();
        return redirect('/customer/login')->with('reset_success','Password Reset Success!!');
    }
    function verify_email($verify_token){
        $token = CustomerEmailVerify::where('verify_token',$verify_token)->firstOrFail();
        $customer = Customerlogin::findOrFail($token->customer_id);
        $customer->update([
            'email_verified_at'=>Carbon::now(),
        ]);
        $token->delete();
        return redirect('/customer/login')->with('verify','Email Verified Success!!');
    }
}
