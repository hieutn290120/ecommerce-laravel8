<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
// Frontend

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\BlogListController;
use App\Http\Controllers\Frontend\ProductController;






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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('member-register', [MemberController::class, 'register']);
Route::post('member-register', [MemberController::class, 'getRegister']);

Route::get('member-login', [MemberController::class, 'login']);

Route::post('member-login', [MemberController::class, 'getLogin']);


Route::get('/logout', [MemberController::class, "logout"]);
Route::get('bloglist', [BlogListController::class, 'index']);
Route::get('/blog-details/{id}', [BlogListController::class, 'blogDetails']);
Route::post('/blog-cmt', [BlogListController::class, "comment"]);
Route::get('/account', [MemberController::class, "account"]);
Route::post('/account', [MemberController::class, "updateAccount"]);
Route::get('/product/edit/{id}', [ProductController::class, "edit"]);
Route::get('/product-details/{id}', [ProductController::class, 'getDetails']);


    




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/profile', [UserController::class, 'index']);
Route::post('/admin/profile',[UserController::class, 'update']);
Route::get('/admin/country', [CountryController::class, 'index']);
Route::get('/country/add', [CountryController::class, 'create']);
Route::post('/country/add', [CountryController::class, 'store']);
Route::get('/country/edit/{id}',[CountryController::class, 'edit']);
Route::post('/country/edit/{id}',[CountryController::class, 'update']);
Route::get('/country/delete/{id}',[CountryController::class, 'destroy']);
Route::get('/admin/blog',[BlogController::class, 'index']);
Route::get('/blog/add',[BlogController::class, 'add']);
Route::post('/blog/add',[BlogController::class, 'save']);
Route::get('/blog/edit/{id}',[BlogController::class, 'edit']);
Route::post('/blog/edit/{id}',[BlogController::class, 'update']);
Route::get('/blog/delete/{id}',[BlogController::class, 'delete']);
Route::get('admin/category',[CategoryController::class, 'category']);
Route::get('category/add',[CategoryController::class, 'show']);
Route::post('category/add',[CategoryController::class, 'add']);
Route::get('/category/edit/{id}', [CategoryController::class, "edit"]);
Route::post('/category/edit/{id}', [CategoryController::class, "update"]);
Route::get('/category/delete/{id}', [CategoryController::class, "delete"]);
Route::get('/admin/brand', [BrandController::class, "brand"]);
Route::get('/brand/add', [BrandController::class, "show"]);
Route::post('/brand/add', [BrandController::class, "create"]);
Route::get('/brand/edit/{id}', [BrandController::class, "edit"]);
Route::post('/brand/edit/{id}', [BrandController::class, "update"]);
Route::get('/brand/delete/{id}', [BrandController::class, "destroy"]);
