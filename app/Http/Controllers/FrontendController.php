<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Size;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class FrontendController extends Controller
{
    function home(){
        $all_product = Product::orderBy('created_at','DESC')->get();
        $all_categories = Category::all();
        $best_selling = OrderProduct::groupBy('product_id')
        ->selectRaw('sum(quantity) as sum, product_id')
        ->havingRaw('sum >= 5')
        ->orderBy('quantity','DESC')
        ->get();
        $all_tranding = Product::latest()->take(4)->get();
         $get_recent_view = json_decode(Cookie::get('recent_view', true));
        if($get_recent_view == null){
            $get_recent = [];
            $after_unique = array_unique($get_recent);
        }
        else{
            $after_unique = array_unique($get_recent_view);
        }
        $all_recent_product = Product::find($after_unique);
        return view('frontend.index',[
            'all_product'=>$all_product,
            'all_categories'=>$all_categories,
            'best_selling'=>$best_selling,
            'all_recent_product'=>$all_recent_product,
            'all_tranding'=>$all_tranding,
        ]);
    }
    function product_details($product_slug){
        $all_slugs = Product::where('slug',$product_slug)->get();
        $all_thumbnails = Thumbnail::where('product_id',$all_slugs->first()->id)->get();
        $related_products = Product::where('category_id',$all_slugs->first()->category_id)->where('id', '!=',$all_slugs->first()->id)->get();
        $available_color = Inventory::where('product_id',$all_slugs->first()->id)->groupBy('color_name')->selectRaw('sum(color_name) as sum, color_name')->get();
        $reviews = OrderProduct::where('product_id',$all_slugs->first()->id)->whereNotNull('review')->get();
        $total_review = OrderProduct::where('product_id',$all_slugs->first()->id)->whereNotNull('review')->count();
        $total_star = OrderProduct::where('product_id',$all_slugs->first()->id)->whereNotNull('review')->sum('star');
        $product_id = $all_slugs->first()->id;
        $all = Cookie::get('recent_view');
        if(!$all){
            $all = '[]';
        }
        $all_info = json_decode($all, true);
        $all_info = Arr::prepend($all_info,$product_id);
        $recent_viewed_id = json_encode($all_info);
        Cookie::queue('recent_view', $recent_viewed_id , 1000);
        return view('frontend.product_details',[
            'all_slugs'=>$all_slugs,
            'all_thumbnails'=>$all_thumbnails,
            'related_products'=>$related_products,
            'available_color'=>$available_color,
            'reviews'=>$reviews,
            'total_review'=>$total_review,
            'total_star'=>$total_star,
        ]);
    }
    function getsize(Request $request){
        $str = '<option value=""> --Select Size -- </option>';
        $sizes = Inventory::where('product_id',$request->product_id)->where('color_name',$request->color_id)->get();
        foreach($sizes as $size){
            $str.= '<option value="'.$size->size_name.'">'.$size->rel_to_size->size_name.'</option>';
        }
        echo $str;
    }
    function cart(Request $request){
        $coupon = $request->coupon;
        $message = null;
        $type = null;
        if($coupon == ''){
            $discount = 0;
        }
        else{
            if(Coupon::where('coupon_name',$coupon)->exists()){
                if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name',$coupon)->first()->validity){
                    $discount = 0;
                    $message = 'Coupon Code Expired';
                }
                else{
                    $discount = Coupon::where('coupon_name',$coupon)->first()->amount;
                    $type = Coupon::where('coupon_name',$coupon)->first()->type;
                }
            }
            else{
                $discount = 0;
                $message = 'Invalid Coupon Code';
            }
        }
        $carts = Cart::where('customer_id', Auth::guard('customerlogin')->id())->get( );
        return view('frontend.cart',[
            'carts'=>$carts,
            'discount'=>$discount,
            'message'=>$message,
            'type'=>$type,
        ]);
    }
    function checkout(){
        $all_countries = Country::all();
        return view('frontend.checkout',[
            'all_countries'=>$all_countries,
        ]);
    }
    function account(){
        $orders = Order::where('customer_id',Auth::guard('customerlogin')->id())->get();
        return view('frontend.account',[
            'orders'=>$orders,
        ]);
    }
    function shop(Request $request){
        $data = $request->all();
        $term = 'created_at';
        $order = 'DESC';
    if(!empty($data['sort']) && $data['sort'] != '' && $data['sort'] != 'undefined'){
        if($data['sort'] == 1){
            $term = 'product_name';
            $order = 'ASC';
        }
        else if($data['sort'] == 2){
            $term = 'product_name';
            $order = 'DESC';
        }
        else if($data['sort'] == 3){
            $term = 'after_discount';
            $order = 'DESC';
        }
        else if($data['sort'] == 4){
            $term = 'after_discount';
            $order = 'ASC';
        }
        else{
            $term = 'created_at';
            $order = 'DESC';
        }
    }
        $all_products = Product::where(function($q) use ($data){
        if(!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined'){
            $q->where(function ($q) use ($data){
                $q->where('product_name','like', '%'.$data['q'].'%');
                $q->orWhere('long_desp','like', '%'.$data['q'].'%');
            });
        }
        if(!empty($data['category']) && $data['category'] != '' && $data['category'] != 'undefined'){
            $q->where('category_id',$data['category']);
        }
        if(!empty($data['min']) && $data['min'] != '' && $data['min'] != 'undefined' || !empty($data['max']) && $data['max'] != '' && $data['max'] != 'undefined'){
            $q->whereBetween('after_discount',[$data['min'],$data['max']]);
        }
        if(!empty($data['color']) && $data['color'] != '' && $data['color'] != 'undefined' || !empty($data['size']) && $data['size'] != '' && $data['size'] != 'undefined'){
            $q->whereHas('rel_to_inventory', function($q) use ($data){
                if(!empty($data['color']) && $data['color'] != '' && $data['color'] != 'undefined'){
                    $q->whereHas('rel_to_color', function($q) use ($data){
                        $q->where('colors.id', $data['color']);
                    });
                }
                if(!empty($data['size']) && $data['size'] != '' && $data['size'] != 'undefined'){
                    $q->whereHas('rel_to_size', function($q) use ($data){
                        $q->where('sizes.id', $data['size']);
                    });
                }
            });
        }
    })->orderBy($term, $order)->get();
        $all_categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('frontend.shop_grid',[
            'all_products'=>$all_products,
            'all_categories'=>$all_categories,
            'colors'=>$colors,
            'sizes'=>$sizes,
        ]);
    }
}
