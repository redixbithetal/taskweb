<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
use DataTables;
class UserController extends Controller
{
    
    public function show_users(){
        return view("admin.user.default");
    }

    public function users_data_table(){
         $user =User::where("user_type",'0')->get();
         return DataTables::of($user)
            ->editColumn('id', function ($user) {
                return $user->id;
            })            
            ->editColumn('image', function ($user) {
                return url("storage/app/public/profile")."/".$user->profile_image;
            }) 
            ->editColumn('name', function ($user) {
                return $user->fullname;
            }) 
            ->editColumn('email', function ($user) {
                return $user->email;
            }) 
            ->editColumn('gender', function ($user) {
                return $user->gender;
            })     
            ->editColumn('dob', function ($user) {
                return $user->dob;
            }) 
            ->editColumn('action', function ($user) {
                if($user->status=='0'){
                    return '<span class="btn btn-success">New</span>';
                }
                if($user->status=='1'){
                    return '<span class="btn btn-success">Accept</span>';
                }
                if($user->status=='2'){
                    return '<span class="btn btn-danger">Reject</span>';
                }
                return $user->status;
            })                     
            ->make(true);
    
    }


    public function show_birthday_users(){
         return view("admin.user.birthday");
    }


    public function show_anniversary(){
         return view("admin.user.anniversary");
    }


    public function birthday_data_table(){
              $user =User::orderby('dob')->where("user_type",'0')->get();
         return DataTables::of($user)
            ->editColumn('id', function ($user) {
                return $user->id;
            })
            ->editColumn('name', function ($user) {
                return $user->fullname;
            }) 
            ->editColumn('email', function ($user) {
                return $user->email;
            }) 
            ->editColumn('birthday_day', function ($user) {
                 $time=strtotime($user->dob);
                $m=date("m",$time);
                $d=date("d",$time);
                $date1=date_create(date("Y-m-d"));
                $date2=date_create(date("Y-".$m."-".$d));
                $diff=date_diff($date1,$date2);
                return $diff->format("%R%a days left");
            })     
            ->editColumn('birthday_date', function ($user) {
                return $user->dob;
            })                
            ->make(true);
    }


      public function anniversary_data_table(){
         $user =User::orderby('anniversary_date')->where("anniversary_date","!=","")->where("user_type",'0')->get();
         return DataTables::of($user)
            ->editColumn('id', function ($user) {
                return $user->id;
            })
            ->editColumn('name', function ($user) {
                return $user->fullname;
            }) 
            ->editColumn('email', function ($user) {
                return $user->email;
            }) 
            ->editColumn('anniversary_day', function ($user) {
                $time=strtotime($user->anniversary_date);
                $m=date("m",$time);
                $d=date("d",$time);
                $date1=date_create(date("Y-m-d"));
                $date2=date_create(date("Y-".$m."-".$d));
                $diff=date_diff($date1,$date2);
                return $diff->format("%R%a days left");
            })     
            ->editColumn('anniversary_date', function ($user) {
                return $user->anniversary_date;
            })                
            ->make(true);
    }


    public function show_change_user_status(Request $request){
        $arr = explode(",",$request->get("ids"));
        foreach ($arr as $k) {
             $get_user = User::find($k);
             if($get_user){
                $get_user->status = $request->get("status");
                $get_user->save();
             }
        }

        return 1;
    }

}
