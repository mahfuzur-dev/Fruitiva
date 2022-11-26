<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    function product(){
        $all_categories = Category::all();
        $all_subcategories = Subcategory::all();
        return view('admin.product.index',[
            'all_categories'=>$all_categories,
            'all_subcategories'=>$all_subcategories,
        ]);
    }
    function getsubcategory(Request $request){
        $sub_categories = Subcategory::where('category_id',$request->category_id)->get();
        $str = '<option value=""> -- Select Sub Category -- </option>';
        foreach($sub_categories as $sub_category){
            $str .= "<option value='$sub_category->id'>$sub_category->sub_category</option>";
        }
        echo $str;
    }
    function add_product(Request $request){
        $request->validate([
            'category_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'short_desp'=>'required',
            'long_desp'=>'required',
            'thumbnail'=>'required',
        ]);
        $name = str_replace('','-', $request->product_name);
        $slug = Str::lower($name).'-'.random_int(10000,90000000);
        $price = $request->product_price;
        $discount = $request->product_discount;
        $after_disount = $price - ($price*$discount/100);
        $product_id = Product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$price,
            'product_discount'=>$discount,
            'after_discount'=>$after_disount,
            'after_discount'=>$after_disount,
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp, 
            'slug'=>$slug,
            'created_at'=>Carbon::now(),
        ]);
        $preview = $request->preview;
        $extension = $preview->getClientOriginalExtension();
        $file_name =  $slug = Str::lower($name).'-'.random_int(100,999).'.'.$extension;
        Image::make($preview)->resize(680,680)->save(public_path('uploads/product/preview/'.$file_name));
        Product::find($product_id)->update([
            'preview'=>$file_name,
        ]);
        $thumbnails = $request->thumbnail;
        foreach($thumbnails as $thumbnail){
            $thumbnails_extension = $thumbnail->getClientOriginalExtension();
            $thumb_file_name = Str::lower($name).'-'.random_int(100,999).'.'.$thumbnails_extension;
            Image::make($thumbnail)->resize(680,680)->save(public_path('uploads/product/thumbnail/'.$thumb_file_name));
            Thumbnail::insert([
                'product_id'=>$product_id,
                'thumbnail'=>$thumb_file_name,
                'created_at'=>Carbon::now(),
            ]);
        }
        return back()->with('success','Product Successfully Added');
    }
    function view_product(){
        $all_products = Product::all();
        return view('admin.product.view_product',[
            'all_products'=>$all_products,
        ]);
    }
    function delete_product($product_id){
        $image = Product::find($product_id);
        $delete_from = public_path('uploads/product/preview/'.$image->preview);
        unlink($delete_from);
        $image_thumb = Thumbnail::find($product_id);
        $delete_from_thumb = public_path('uploads/product/thumbnail/'.$image_thumb->thumbnail);
        unlink($delete_from_thumb);
        Thumbnail::find($product_id)->delete();
        Product::find($product_id)->delete();
        return back();
    }
    function color_size(){
        $all_colors = Color::all();
        $all_sizes = Size::all();
        return view('admin.product.color_size',[
            'all_colors'=>$all_colors,
            'all_sizes'=>$all_sizes,
        ]);
    }
    function add_color(Request $request){
        $request->validate([
            'color_name'=>'required',
            'color_code'=>'required',
        ]);
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_color','Color Successfully Added!');
    }
    function delete_color($color_id){
        Color::find($color_id)->delete();
        return back()->with('delete_color','Color Item Successfully Delete');
    }
    function add_size(Request $request){
        $request->validate([
            'size_name'=>'required',
        ]);
        Size::insert([
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_size','Size Successfully Added!');
    }
    function delete_size($size_id){
        Size::find($size_id)->delete();
        return back()->with('delete_size','Size Item Successfully Delete');
    }
    function inventory($product_id){
        $all_product_info = Product::find($product_id);
        $all_colors = Color::all();
        $all_sizes = Size::all();
        $all_inventories = Inventory::all();
        return view('admin.product.inventory',[
            'all_product_info'=>$all_product_info,
            'all_colors'=>$all_colors,
            'all_sizes'=>$all_sizes,
            'all_inventories'=>$all_inventories,
        ]);
    }
    function add_inventory(Request $request){
        $request->validate([
            'quantity'=>'required',
        ]);
        if(Inventory::where('product_id',$request->product_id)->where('color_name',$request->color_name)->where('size_name',$request->size_name)->exists()){
            Inventory::where('product_id',$request->product_id)->where('color_name',$request->color_name)->where('size_name',$request->size_name)->increment('quantity',$request->quantity);
            return back()->with('success','Inventory Successfully Added!!');
        }
        else{
            Inventory::insert([
            'product_id'=>$request->product_id,
            'product_name'=>$request->product_name,
            'color_name'=>$request->color_name,
            'size_name'=>$request->size_name,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
         return back()->with('success','Inventory Successfully Added!!');
        }
        
    }
    function delete_inventory($inventory_id){
        Inventory::find($inventory_id)->delete();
        return back()->with('del_success','Inventory Successfully Deleted!!');
    }
}
