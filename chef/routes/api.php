<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\Chef_loginController;
use App\Http\Controllers\Chef_regController;
use App\Http\Controllers\Chef_profileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controller\Customer_loginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function(){
    //All secure URL's

    // Chefs Table 

Route::post("reg",[Chef_regController::class,'store']);
Route::post("profile",[Chef_profileController::class,'store']);
Route::post("chef",[ChefController::class,'store']);

//customer

Route::post("customer",[CustomerController::class,'store']);

/////////////////////////////////////////////////////////////////////////////////////////////////

//Chef(for admin dashboard)

Route::get('chef',[ChefController::class,'index']);  //chef list view in admin dashboard
Route::get('chef/getData',[ChefController::class,'getData']);
Route::post('chef/store',[ChefController::class,'store']);
Route::delete('chef/delete/{username}',[ChefController::class,'delete']);
//Route::put('chef/update',[ChefController::class,'update']);

//Coupon

Route::get('coupon',[CouponController::class,'index']);
Route::get('coupon/getData',[CouponController::class,'getData']);
Route::post('coupon/store',[CouponController::class,'store']);
Route::get('coupon/edit/{id}',[CouponController::class,'edit']);
Route::put('coupon/update/{id}',[CouponController::class,'update']);
Route::delete('coupon/destroy/{id}',[CouponController::class,'destroy']);


//Package

Route::get('packager',[PackageController::class,'index']);
Route::get('packager/getData',[PackageController::class,'getData']);
Route::post('packager/store',[PackageController::class,'store']);
Route::get('packager/edit/{id}',[PackageController::class,'edit']);
Route::delete('packager/destroy/{id}',[PackageController::class,'destroy']);
Route::put('packager/update{id}',[PackageController::class,'update']);

//Product

Route::get('product',[ProductController::class,'index']);
Route::post('product/add',[ProductController::class,'addProduct']);
Route::delete('product/delete/{id}',[ProductController::class,'delete']);
Route::put('product/update',[ProductController::class,'update']);

//customer

Route::get('customer',[CustomerController::class,'index']);
//Route::post('user/add',[UserController::class,'addUser']);
//Route::delete('user/delete/{id}',[UserController::class,'delete']);
//Route::put('user/update',[UserController::class,'update']);


});


//Admin
Route::post('admin_login',[AdminController::class,'login']);
Route::post('logout',[AdminController::class,'logout']);

//chef
Route::post("chef_login",[Chef_loginController::class,'login']);

//customer
Route::post("customer_login",[Customer_login::class,'login']);