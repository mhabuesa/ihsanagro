<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function user(){
        $users = User::where('id', '!=', Auth::user()->id)->latest()->get();
        return view('backend.user.user',compact('users'));
    }

    function user_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),

        ]);
        return back()->with('message', 'User Created Successfully');
    }

    function user_delete($id){
        User::find($id)->delete();
        return back()->with('message', 'User Deleted Successfully');
    }
}
