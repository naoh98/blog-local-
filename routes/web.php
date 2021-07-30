<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//------------------------------------------FRONTEND---------------------------------------------//
//-----------------------------------------------------------------------------------------------//
//view trang bìa
Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, "coverpage"])->name("welcome");
//view trang chủ
Route::get('/home', [\App\Http\Controllers\Frontend\HomeController::class, "index"])->name("home");

//view login và xử lý đăng nhập
Route::get("/signin", [\App\Http\Controllers\Frontend\AuthController::class, "viewlogin"])->name("login");
Route::post("/signin", [\App\Http\Controllers\Frontend\AuthController::class, "dologin"])->name("dologin");
//view register và xử lý đăng ký
Route::get("/signup", [\App\Http\Controllers\Frontend\AuthController::class, "viewregister"])->name("register");
Route::post("/signup", [\App\Http\Controllers\Frontend\AuthController::class, "doregister"])->name("doregister");
//đăng xuất
Route::get("/logout", [\App\Http\Controllers\Frontend\AuthController::class, "logout"])->name("logout");
//view tạo blog và xử lý
Route::get("/create",[\App\Http\Controllers\Frontend\NewsController::class, "createpage"])->name("createblog");
Route::post("/create",[\App\Http\Controllers\Frontend\NewsController::class, "createblog"])->name("docreateblog");
//view blog detail
Route::get("/story/{id}",[\App\Http\Controllers\Frontend\NewsController::class, "detailpage"])->name("blogdetail");
//view sửa blog và xử lý
Route::get("/edit/{id}", [\App\Http\Controllers\Frontend\NewsController::class, "editpage"])->name("editblog");
Route::post("/edit/{id}", [\App\Http\Controllers\Frontend\NewsController::class, "editblog"])->name("doeditblog");
//delete blog
Route::get("/delete/{id}", [\App\Http\Controllers\Frontend\NewsController::class, "deleteblog"])->name("deleteblog");
//category page
Route::get("/category/{catname}",[\App\Http\Controllers\Frontend\CategoryController::class, "category"])->name("category.blog");
//search feature
Route::get("/search",[\App\Http\Controllers\Frontend\CategoryController::class, "search"])->name("search");


//------------------------------------------BACKEND---------------------------------------------//
//----------------------------------------------------------------------------------------------//
//gom 'admin' làm bắt đầu đường dẫn cho backend
Route::prefix("/admin")->group( function(){
    //view welcome admin
    Route::get("/", [\App\Http\Controllers\Backend\DashboardController::class, "index"])->name("dashboard");
    //view login và xử lý
    Route::get("/signin",[\App\Http\Controllers\Backend\AuthController::class, "loginpage"])->name("admin.logpage");
    Route::post("/signin",[\App\Http\Controllers\Backend\AuthController::class, "login"])->name("admin.login");
    //view register và xử lý
    Route::get("/signup",[\App\Http\Controllers\Backend\AuthController::class, "regpage"])->name("admin.regpage");
    Route::post("/signup",[\App\Http\Controllers\Backend\AuthController::class, "register"])->name("admin.register");
    //logout
    Route::get("/logout",[\App\Http\Controllers\Backend\AuthController::class, "logout"])->name("admin.logout");
    //view category
    Route::get("/category", [\App\Http\Controllers\Backend\CategoryController::class, "index"])->name("cat");
    //view create category và xử lý
    Route::get("/category/create", [\App\Http\Controllers\Backend\CategoryController::class, "create_cat"])->name("newcat");
    Route::post("/category/create", [\App\Http\Controllers\Backend\CategoryController::class, "do_create_cat"])->name("donewcat");
    //view edit category và xử lý
    Route::get("/category/edit/{catid}", [\App\Http\Controllers\Backend\CategoryController::class, "edit_cat"])->name("editcat");
    Route::post("/category/edit/{catid}", [\App\Http\Controllers\Backend\CategoryController::class, "do_edit_cat"])->name("doeditcat");
    //xử lý delete category
    Route::get("/category/delete/{catid}", [\App\Http\Controllers\Backend\CategoryController::class, "deletecat"])->name("deletecat");
});
//
//Auth::routes();
