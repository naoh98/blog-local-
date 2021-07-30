<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //hàm khởi tạo khi chưa đăng nhập thì ko làm đc gì ngoài việc đăng ký, đăng nhập
    public function __construct()
    {
        $this->middleware('felogin');
    }
    //find lastest child
    public function lastest_child(&$childcat,$id){
        $arr=DB::table("category")->where("parent_id",$id)->get();
        if (count($arr)>0){
            foreach ($arr as $key => $value){
                $newid = $value->id;
                $this->lastest_child($childcat,$newid);
            }
        }else{
            $childcat[]=$id;
        }
    }
    //view create blog
    public function createpage(){
        $cats = DB::table("category")->get();
        $arr=[];
        foreach ($cats as $key => $value){
            $this->lastest_child($arr,$value->id);
        }
        $arr2=array_unique($arr);
        $catforblog=DB::table("category")->whereIn("id",$arr2)->get();
        return view("frontend.content.blog.create", ["cats"=>$catforblog]);
    }
    //xử lý create new blog
    public function createblog(Request $request){
        $validate=[
          "title"=>"required",
          "blog_content"=>"required",
        ];
        $mess=[
          "required"=>":attribute is not allowed to be empty"
        ];
        $this->validate($request,$validate,$mess);

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date= date("Y/m/d H:i:s");
        $arr =[
            "title"=>$request->title,
            "content"=>$request->blog_content,
            "cat_id"=>$request->category_id,
            "user_id"=>session("felogin")["id"],
            "date"=>$date
        ];

        DB::table("blog")->insert($arr);
        return redirect(route("home"));
    }
    //
    public function detailpage(Request $request,$id){
        $blog=DB::table("blog")
            ->where("blog.id",$id)
            ->join("users","blog.user_id","=","users.id")
            ->select("blog.*","users.name")
            ->first();
        return view("frontend.content.blog.blogdetail",["blog"=>$blog]);
    }
    //
    public function editpage($id){
        $cats = DB::table("category")->get();
        $arr=[];
        foreach ($cats as $key => $value){
            $this->lastest_child($arr,$value->id);
        }
        $arr2 = array_unique($arr);
        $cat = DB::table("category")->whereIn("id",$arr2)->get();
        $blog = DB::table("blog")->where("id",$id)->first();
        return view("frontend.content.blog.edit",["cat"=>$cat,"blog"=>$blog]);
    }
    //
    public function editblog(Request $request,$id){
        $validate =[
          "title"=>"required",
          "blog_content"=>"required"
        ];
        $mess=[
         "required"=>"you need to fill :attribute"
        ];
        $this->validate($request,$validate,$mess);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y/m/d H:i:s");
        $arr =[
          "title"=>$request->title,
          "content"=>$request->blog_content,
          "cat_id"=>$request->category_id,
          "user_id"=>session("felogin")["id"],
          "date"=>$date,
        ];
        DB::table("blog")->where("id",$id)->update($arr);
        return redirect(route("blogdetail",["id"=>$id]))->with("status","Update successfully");
    }
    //
    public function deleteblog($id){
        DB::table("blog")->where("id",$id)->delete();
        return redirect(route("home"));
    }

}
