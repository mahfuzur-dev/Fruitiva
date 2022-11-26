<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Image;

class UserController extends Controller
{
    function users(){
        $users = User::all();
        $total_user = User::count();
        return view('admin.user.users',[
            'users'=>$users,
            'total_user'=>$total_user,
        ]);
    }
    function user_delete($user_id){
        User::find($user_id)->delete();
        return back()->with('delete','User Delete Successfully');
    }
    function profile(){
        return view('admin.user.profile');
    }
    function update_name(Request $request){
        User::find(Auth::id())->update([
            'name'=>$request->name,
        ]);
        return back()->with('success', 'Name has been Updated!');
    }
    function change_password(Request $request){
        $request->validate([
            'old_password'=> 'required',
            'password'=> ['required',Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirmation'=> 'required',
        ]);
        if(Hash::check($request->old_password, Auth::user()->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('success_pass', 'Password has been Updated!');
        }
        else{
            return back()->with('wrong','Password Doesnot Match!');
        }
        
    }
    function profile_photo(Request $request){
        $profile_photo = $request->profile_photo;

        if(Auth::user()->profile_photo  != 'default.jpg'){
            $path = public_path('uploads/user/'.Auth::user()->profile_photo);
            unlink($path);
            
            $extension = $profile_photo->getClientOriginalExtension();
            $file_name = Auth::id().'.'.$extension;
            $img = Image::make($profile_photo)->save(public_path('uploads/user/'.$file_name));
            User::find(Auth::id())->update([
                'profile_photo'=>$file_name,
            ]);
            return back()->with('success_profile', 'Profile has been Updated!');
        }
        else{
            $extension = $profile_photo->getClientOriginalExtension();
            $file_name = Auth::id().'.'.$extension;
            $img = Image::make($profile_photo)->save(public_path('uploads/user/'.$file_name));
            User::find(Auth::id())->update([
                'profile_photo'=>$file_name,
            ]);
            return back()->with('success_profile', 'Profile has been Updated!');
        }
    }
}
