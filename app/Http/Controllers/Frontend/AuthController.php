<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //view login
    public function viewlogin(){
        return view("frontend.content.authentication.login");
    }
    //view register
    public function viewregister(){
        return view("frontend.content.authentication.register");
    }
    //do login
    public function dologin(Request $request){
        $validate=[
            'username'=>'required',
            'password'=>'required'
        ];
        $mess=[
          'required'=>'You need to fill :attribute'
        ];
        $this->validate($request,$validate,$mess);

        $username=$request->username;
        $password=$request->password;
        $checkuser = DB::table("users")->where("username",$username)->first();
        $checkpass = DB::table("users")
            ->select("password")
            ->where("username",$username)
            ->first();

        if (!$checkuser){
            return redirect(route("login"))->with("status","Account does not exist");
        }else{
            if (!Hash::check($password,$checkpass->password)){
                return redirect(route("login"))->with("status","Wrong password");
            }else{
                $user = DB::table("users")
                    ->where("username",$username)
                    ->first();

                session(["felogin"=>[
                    "id" => $user->id,
                    "name"=>$user->name,
                    "role"=>$user->role
                ]]);
                return redirect(route("welcome"));
            }
        }
    }
    //do register
    public function doregister(Request $request){
        $validate=[
          "name"=>"required",
          "username"=>"required|unique:users,username",
          "password"=>"required|min:6",
          "confirm"=>"required|min:6",
        ];
        $mess=[
          "required"=>"you need to fill :attribute",
          "min"=>":attribute at least 6 characters",
          "unique"=>"this :attribute already exist"
        ];
        $this->validate($request,$validate,$mess);
        $arr=[
          "name"=>$request->name,
          "username"=>$request->username,
          "password"=>Hash::make($request->password),
          "role"=>"user"
        ];
        if ($request->password != $request->confirm){
            return redirect(route("register"))->with("status","wrong password confirm");
        }
        DB::table("users")->insert($arr);
        return redirect(route("login"))->with("success","Register successfully");

    }
    //logout
    public function logout(Request $request){
        $request->session()->forget("felogin");
        return redirect(route("welcome"));
    }
}
