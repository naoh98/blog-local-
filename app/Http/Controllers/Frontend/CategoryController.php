<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //hàm khởi tạo khi chưa đăng nhập thì ko làm đc gì ngoài việc đăng ký, đăng nhập
    public function __construct()
    {
        $this->middleware('felogin');
    }
    //
    public function find_child_blog(&$arr,$catname){
        $parent=DB::table("category")->where("category_name",$catname)->get();
        foreach ($parent as $key => $value){
            $arr[]=$value->id;
            $child=DB::table("category")->where("parent_id",$value->id)->get();
            foreach ($child as $key1 => $value1){
                $arr[]=$value1->id;
                $this->find_child_blog($arr,$value1->category_name);
            }
        }
    }
    //
    public function category($catname){
        $arr=[];
        $this->find_child_blog($arr,$catname);
        $arr2=array_unique($arr);
        $blog = DB::table("blog")
            ->whereIn("cat_id",$arr2)
            ->join("category","blog.cat_id","=","category.id")
            ->join("users","blog.user_id","=","users.id")
            ->select("blog.*","users.name","category.category_name")
            ->orderBy("id","asc")
            ->paginate(12);
        return view("frontend.content.blog.blog_filter",["blog"=>$blog]);
    }
    //
    public function search(Request $request){
        if ($request->text){
            $search = DB::table("users")
                ->whereRaw("LOWER(users.name) LIKE ? ", "%".strtolower($request->text)."%")
                ->join("blog","users.id","=","blog.user_id")
                ->join("category","category.id","=","blog.cat_id")
                ->select("blog.*","users.name","category.category_name")
                ->paginate(12);
            $view = view("frontend.content.home",["blog"=>$search])->render();
            return response()->json([
               "html"=>$view,
                "code"=>200,
                "url"=>route("home")
            ]);
        }
    }
}
