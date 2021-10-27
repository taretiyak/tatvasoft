<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertable;
use Validator;
use Hash;
use Session;

class Usermgmt extends Controller
{
    // description: this function is for load login view
    function login(){
        return view('login');
    }
    // description: this function is for validate the user
    function loginsubmit(Request $request){
        $login=$request->email;
        $password=$request->password;
        $validate=Validator::make($request->all(),['email'=>'required|email','password'=>'required']);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withinput();
        }else{
            $user=Usertable::Where('email','=',$login)->get()->first();
            if(isset($user->id)){
                if(Hash::check($password, $user->password)){
                    Session::put('email',$login);
                    Session::put('user_id',$user->id);
                    return redirect('/');
                }else{
                    return redirect()->back()->with('error','passwords not match');
                }
            }else{
                return redirect()->back()->with('error','email not found');
            }
        }
    }
    // description: this function is for logout user
    function signout(){
        Session::flush(); 
        return redirect('/');
    }
    // description: this function is for add user
    function signup(Request $request){
        return view('signup');
    }
    // description: this function is for add user
    function signupsubmit(Request $request){
        $email=$request->email;
        $password=$request->password;
        $name=$request->name;
        $validate=Validator::make($request->all(),['name'=>'required','email'=>'required|email|unique:user,email','password'=>'required|same:cpassword']);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withinput();
        }else{
            $user=new Usertable;
            $user->name=$name;
            $user->email=$email;
            $user->password=Hash::make($password);
            if($user->save()){
                return redirect('/login');  
            }else{
                return redirect()->back()->with('errors','failed');
            }
        }
    }
}
