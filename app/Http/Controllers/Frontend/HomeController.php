<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //hàm khởi tạo khi chưa đăng nhập thì ko làm đc gì ngoài việc đăng ký, đăng nhập
    public function __construct()
    {
        $this->middleware('felogin')->except("coverpage");
    }

    //view home
    public function index(){
        $blog=DB::table("blog")
            ->join("users","blog.user_id","=","users.id")
            ->join("category","blog.cat_id","=","category.id")
            ->select("category.category_name","users.name","blog.*")
            ->orderBy("id","asc")
            ->paginate(12);
        return view("frontend.content.home",["blog"=>$blog]);
    }
    //view trang bia
    public function coverpage(){

        return view("frontend.cover");
    }

}
