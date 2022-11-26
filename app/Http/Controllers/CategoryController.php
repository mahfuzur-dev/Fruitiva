<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class CategoryController extends Controller
{
    function category(){
        $all_categories = Category::all();
        return view('admin.category.category',[
            'all_categories'=>$all_categories,
        ]);
    }
    function add_category(Request $request){
        $request->validate([
            'category_name'=>'required',
            'category_image'=>'required',
        ]);
        $category_id = Category::insertGetId([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
        $category_image = $request->category_image;
        $extension = $category_image->getClientOriginalExtension();
        $file_name = $category_id.'.'.$extension;
        Image::make($category_image)->save(public_path('uploads/category/'.$file_name));
        Category::where('id',$category_id)->update([
            'category_image'=>$file_name,
        ]);
        return back()->with('success','Category Insert Success!');
    }
    function delete_category($category_id){
        $image = Category::find($category_id);
        $delete_from = public_path('uploads/category/'.$image->category_image);
        unlink($delete_from);
        Category::find($category_id)->delete();
        return back()->with('delete','Category Deleted!');
    }
    function edit_category($category_id){
        $all_info = Category::find($category_id);
        return view('admin.category.edit_category',[
            'all_info'=>$all_info,
        ]);
    }
    function update_category(Request $request){
        if($request->category_image == ''){
            Category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
            ]);
             return back()->with('success','Category Updated Successfully');
        }
        else{
           $image = Category::find($request->category_id);
            $delete_edit = public_path('uploads/category/'.$image->category_image);
            unlink($delete_edit);
           $category_image = $request->category_image;
           $extension = $category_image->getClientOriginalExtension();
           $file_name = $request->category_id.'.'.$extension;
           Image::make($category_image)->save(public_path('uploads/category/'.$file_name));
           Category::find($request->category_id)->update([
            'category_name'=>$request->category_name,
            'category_image'=>$file_name,
           ]);
            return back()->with('success','Category Updated Successfully');
        }
    }
}
