<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("belogin");
    }

    //
    public function index(){
        $cat = DB::table("category")->get();
        return view("backend.content.category.index", ['cat'=>$cat]);
    }
    //
    public function create_cat(){
        $cat = DB::table("category")->get();
        return view("backend.content.category.create", ['cat'=>$cat]);
    }
    //
    public function edit_cat($id){
        $cat = DB::table("category")->where("id",$id)->first();
        $cats = DB::table("category")->get();
        return view("backend.content.category.edit", ['cat'=>$cat,'cats'=>$cats]);
    }
    //
    public function do_create_cat(Request $request){
        $validate = [
          "category_name" => "required|unique:category,category_name"
        ];
        $mess = [
          "required"=>"you must fill :attribute",
          "unique"=>"try another :attribute"
        ];
        $this->validate($request,$validate,$mess);
        $arr = [
          "category_name"=>$request->category_name,
          "parent_id"=>$request->parent_id,
        ];
        DB::table("category")->insert($arr);
        return redirect(route("cat"))->with("success","thêm danh mục thành công");
    }
    //tìm id danh mục con của danh mục hiện tại
    public function find_child(&$arr,$id){
        $data = DB::table("category")->where("parent_id",$id)->get();
        foreach ($data as $key => $value){
            $cid = $value->id;
            $arr[] = $cid;
            unset($data[$key]);
            $this->find_child($arr,$cid);
        }
    }
    //
    public function do_edit_cat(Request $request, $id){
        $validate_cat =[
            'category_name' => ["required",Rule::unique('category')->ignore($id,'id')]
        ];
        $error_messages = [
            'required' => ':attribute required',
            'unique' => ':attribute already exist'
        ];
        $this->validate($request,$validate_cat,$error_messages);
        $arr_con = [];
        $this->find_child($arr_con,$id);
        $checkblog = DB::table("blog")->where("cat_id",$request->parent_id)->get();
        if (in_array($request->parent_id,$arr_con)){
            return redirect(route("editcat",["catid"=>$id]))->with("error","danh mục này ko thể làm con của các danh mục con thuộc nó");
        }else if(count($checkblog)>0){
            return redirect(route("editcat",["catid"=>$id]))->with("error","danh mục bạn chọn vẫn còn blog, một danh mục ko thể ngang hàng với các sản phẩm");
        }else{
            $update =[
              "category_name"=>$request->category_name,
              "parent_id"=>$request->parent_id
            ];
            DB::table("category")->where("id",$id)->update($update);
            return redirect(route("cat"))->with("success","update danh mục thành công");
        }
    }
    //
    public function deletecat($id){
        $arr_con=[];
        $this->find_child($arr_con,$id);
        $checkblog=DB::table("blog")->where("cat_id",$id)->get();
        if(!empty($arr_con)){
            return redirect(route("cat"))->with("error","danh mục này hiện còn các danh mục con, chưa thể xóa");
        }else if(count($checkblog)>0){
            return redirect(route("cat"))->with("error","danh mục này hiện còn các blog, chưa thể xóa");
        }else{
            DB::table("category")->where("id",$id)->delete();
            return redirect(route("cat"))->with("success","xóa danh mục thành công");
        }
    }

}
