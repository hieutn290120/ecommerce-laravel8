<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogListController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\MemberController;

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

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->id();
});




Route::post('/blog/rate', [BlogListController::class, "rating"])->name('rating');

// Product...
Route::get('/product', [ProductController::class, "index"]);

Route::get('/product/add', [ProductController::class, "create"]);

Route::post('/product/add', [ProductController::class, "store"]);

Route::get('/product/{id}/edit', [ProductController::class, "edit"]);

Route::put('/product/{id}', [ProductController::class, "update"]);

Route::delete('/product/{id}/delete', [ProductController::class, "destroy"]);


