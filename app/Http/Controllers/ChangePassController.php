<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function ChangePassword(){
        return view('admin.body.change_pass');
    }
    public function PasswordUpdate(Request $request){
            $validateData = $request->validate([
                    'old_password' => 'required',
                    'password' => 'required|confirmed'
            ]);
            $hashedPassword = Auth::user()->password;
            if(Hash::check($request->old_password, $hashedPassword)){
                  $user = User::find(Auth::id());
                  $user->password = Hash::make($request->password);
                  $user->save();
                  Auth::logout();
                  return redirect()->route('login')->with('success', 'password is changed successfully');
            
                }else{
                    return redirect()->back()->with('error', 'current password is invalide');
                }
    }

    public function ChangeProfile(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.change_profile', compact('user'));
            }
        }
       
    }

    public function ProfileUpdate(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user -> name = $request->name;
            $user -> email = $request->email;
            $user->save();

            return Redirect()->back()->with('success', 'User name updated');
        }else{
            return Redirect()->back();
        }
    }
}
