<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function loginpage(){
        return view("backend.content.auth.login");
    }
    //
    public function regpage(){
        return view("backend.content.auth.register");
    }
    //
    public function login(Request $request){
        $validate=[
          "username"=>"required",
          "password"=>"required"
        ];
        $mess= [
          "required"=>"you need to fill :attribute"
        ];
        $this->validate($request,$validate,$mess);

        $username = $request->username;
        $password = $request->password;
        $check = DB::table("users")
            ->where("username",$username)
            ->first();
        if (!$check){
            return redirect(route("admin.logpage"))->with("status","Account doest not exist");
        }else if($check && (!Hash::check($password,$check->password))){
            return redirect(route("admin.logpage"))->with("status","Wrong password");
        }else if($check && Hash::check($password,$check->password) && ($check->role!="admin")){
            return redirect(route("admin.logpage"))->with("status","You do not have permission to log in here");
        }else if(Auth::attempt(["username"=>$username,"password"=>$password,"role"=>"admin"])){
            return redirect(route("dashboard"));
        }
    }
    //
    public function register(Request $request){
        $validate = [
          "name"=>"required",
          "username"=>"required|unique:users,username",
          "password"=>"required|min:6",
          "confirm"=>"required|min:6"
        ];
        $mess=[
          "required"=>"you need to fill :attribute",
          "unique"=>":attribute already exist",
          "min"=>":attribute must at least 6 characters"
        ];
        $this->validate($request,$validate,$mess);
        $arr = [
          "name"=>$request->name,
          "username"=>$request->username,
          "password"=>Hash::make($request->password),
          "role"=>"admin"
        ];
        if ($request->password != $request->confirm){
            return redirect(route("admin.regpage"))->with("status","wrong confirmed password");
        }
        DB::table("users")->insert($arr);
        return redirect(route("admin.logpage"))->with("success","Register successfully");
    }
    //
    public function logout(){
        Auth::logout();
        return redirect(route("admin.logpage"));
    }
}
