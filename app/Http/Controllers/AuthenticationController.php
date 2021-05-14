<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;

class AuthenticationController extends Controller
{
    

    public function show_login(){
        return view("admin.login");
    }

    public function show_user_register(){
         $checkuser=User::where("email",$request->get("email"))->where("password",$request->get("password"))->where("user_type",'1')->first();
         if(empty($checkuser)){
             $users = new User();
             $users->fullname = "admin";
             $users->email = "admin@gmail.com";
             $users->password = "123";
             $users->user_type = "1";
             $users->save();   
         }
        return view("user_register");
    }

    public function show_user_post_register(Request $request){
        $getusers = User::where("email",$request->get("email"))->first();
        if($getusers){
            return 0;
        }else{
             $users = new User();
             $users->fullname = $request->get("fullname");
             $users->email = $request->get("email");
             $users->gender = $request->get("gender");
             $users->dob = $request->get("dob");
             $users->anniversary_date = $request->get("anniversary_date");
             $users->password = $request->get("password");
             $users->profile_image = $this->fileuploadFileImage($request,"profile","upload_image");
             $users->save();
             return 1;
        }
    }

    public function show_change_password(){
        return view("admin.changepassword");
    }

    public function show_update_change_password(Request $request){
        $store = User::find(Auth::id());
        $store->password = $request->get("npwd");
        $store->save();
        Session::flash('message',"Password Update Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function update_check_password($val){
        if($val==Auth::user()->password){
            return 0;
        }
        return 1;
    }

    public function post_login(Request $request){       
        $checkuser=User::where("email",$request->get("email"))->where("password",$request->get("password"))->where("user_type",'1')->first();
        if($checkuser){
            Auth::login($checkuser, true);
            if($request->get("rem_me")==1){
                setcookie('email', $request->get("email"), time() + (86400 * 30), "/");
                setcookie('password',$request->get("password"), time() + (86400 * 30), "/");
                setcookie('remember',1, time() + (86400 * 30), "/");
            }
            return redirect('dashboard');
        }else{
            Session::flash('message',"Login credentials are wrong"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function show_dashboard(){
        $total_users = count(User::where("user_type",'0')->get());
        return view("admin.dashboard")->with("total_users",$total_users);
    }

   
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

  
    public function show_profile(){
        return view("admin.myprofile");
    }

    public function show_update_profile(Request $request){
        //dd($request->all());
        $store = User::find(Auth::id());
        $store->name = $request->get("name");
        $store->email = $request->get("email");
        if($request->file("upload_image")){
            if(Auth::user()->profile_pic!=""){
                $this->removeImage('profile/' . $store->profile_pic);
            }             
            $store->profile_pic = $this->fileuploadFileImage($request, 'profile', 'upload_image');
        }
        $store->save();
        Session::flash('message',"Profile Update Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
