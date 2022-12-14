<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function cart_store(Request $request){
        Cart::insert([
            'customer_id'=>Auth::guard('customerlogin')->id(),
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('cart','Cart Added!!');
    }
    function remove_cart($cart_id){
        Cart::find($cart_id)->delete();
        return back()->with('cart_del','Cart Deleted!');
    }
    function update_cart(Request $request){
        foreach($request->quantity as $cart_id=>$quantity){
            Cart::find($cart_id)->update([
                'quantity'=>$quantity,
                'created_at'=>Carbon::now(),
            ]);
        }
        return back();
    }
}
