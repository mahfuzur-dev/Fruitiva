<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function subcategory(){
        $all_categories = Category::all();
        $all_subcategories = Subcategory::all();
        return view('admin.subcategory.sub_category',[
            'all_categories' =>$all_categories,
            'all_subcategories' =>$all_subcategories,
        ]);
    }
    
    function add_subcategory(Request $request){
        if(Subcategory::where('category_id',$request->category_id)->where('sub_category',$request->sub_category)->exists()){
            return back()->with('exist','Sub Category Name already taken in this Category');
        }
        else{
            Subcategory::insert([
            'category_id'=>$request->category_id,
            'sub_category'=>$request->sub_category,
            'created_at'=>Carbon::now(),
             ]);
            return back()->with('success','Sub Category Added!');
        }
        
    }
    function delete_subcategory($sub_category_id){
        Subcategory::find($sub_category_id)->delete();
        return back()->with('del_success','SubCategory Deleted!');
    }
}
