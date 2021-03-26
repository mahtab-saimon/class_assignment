<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

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


