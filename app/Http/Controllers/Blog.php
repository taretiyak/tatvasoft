<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\blogtable;
use Validator;
class Blog extends Controller
{
    // description: this function is for load home page
    function home(){
        $blog=blogtable::getBlog();
        return view('index',['blog'=>$blog]);
    }
    // description: this function is for load user home  page
    function userblog(){
        $userid=Session::get('user_id');
        $blog=blogtable::getBlog($userid);
        return view('userblog',['blog'=>$blog]);
    }
    // description: this function is for load add blog
    function addblog(Request $request){
        if($request->isMethod('post')){
            $validate=Validator::make($request->all(),['title'=>'required|max:255','description'=>'required|max:65535','image'=>'required|mimes:jpeg,jpg,png,svg|max:100']);
            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withinput();
            }else{
                $imagename='';
                if(isset($request->image)){
                    $image=$request->file('image');
                    $imagename=time().'.'.$request->image->extension();
                    $dpath=public_path('blog/');
                    $image->move($dpath,$imagename);
                }
                $blog=new blogtable;
                $blog->title=$request->title;
                $blog->description=$request->description;
                $blog->tags=$request->tags;
                $blog->image=$imagename;
                $blog->user_id=Session::get('user_id');
                if($blog->save()){
                    return redirect('/manage');
                }else{
                    return redirect()->back()->with('error','failed');
                }
            }

        }else{
            return view('addblog');
        }
    }
     // description: this function is for load delete blog
    function deleteblog($id){
        $blog=blogtable::find($id);
        if($blog->delete()){
            return redirect()->back()->with('success','delete successfully');
        }else{
            return redirect()->back()->with('error','failed');
        }
    }
     // description: this function is for load edit blog
    function editblog($id ,Request $request){
        if($request->isMethod('post')){
            if(!isset($request->image)){
                $validate=Validator::make($request->all(),['title'=>'required|max:255','description'=>'required|max:65535']);
            }else{
                $validate=Validator::make($request->all(),['title'=>'required|max:255','description'=>'required|max:65535','image'=>'required|mimes:jpeg,jpg,png,svg|max:100']);
            }
            
            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withinput();
            }else{
                $imagename='';
                if(isset($request->image)){
                    $image=$request->file('image');
                    $imagename=time().'.'.$request->image->extension();
                    $dpath=public_path('blog/');
                    $image->move($dpath,$imagename);
                }
                $blog=blogtable::find($id);
                $blog->title=$request->title;
                $blog->description=$request->description;
                $blog->tags=$request->tags;
                if(isset($request->image)){
                    $blog->image=$imagename;
                }
                $blog->user_id=Session::get('user_id');
                if($blog->save()){
                    return redirect('/manage');
                }else{
                    return redirect()->back()->with('error','failed');
                }
            }

        }else{
            $blog=blogtable::find($id);
            return view('editblog',['blog'=>$blog]);
        }
    }
}
