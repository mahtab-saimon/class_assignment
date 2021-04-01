<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CategoryController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('product_list',[ProductController::class,'show']);
Route::post('create', [ProductController::class, 'store']);
Route::get('deletePost/{id}', [ProductController::class, 'destroy']);
Route::get('editPost/{id}', [ProductController::class, 'edit']);
Route::post('update-post/{id}', [ProductController::class, 'update']);
Route::post('dashboard', [LoginController::class, 'dashboard']);

//category
Route::get('category_list',[CategoryController::class,'show']);
Route::get('editCategory/{id}',[CategoryController::class,'edit']);
Route::post('category_add',[CategoryController::class,'store']);
Route::get('deleteCategory/{id}',[CategoryController::class,'destroy']);
Route::post('update-category/{id}',[CategoryController::class,'update']);


//passport
Route::post('login', [LoginController::class, 'login']);
Route::post('registration', [LoginController::class, 'registration']);


