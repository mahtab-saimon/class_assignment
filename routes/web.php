<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


//admin
//Route::get('/admin', [AdminController::class, 'index']);

//home

Route::group(['middleware' => 'checkLoggedIn'], function (){
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

});

Route::group(['middleware' => 'checkLoggedIn'], function (){
    //employees
    Route::get('/addEmployee', [EmployeeController::class, 'index'])->name('/addEmployee');
    Route::post('/insertEmployee', [EmployeeController::class, 'store'])->name('/insertEmployee');
    Route::get('/allEmployee', [EmployeeController::class, 'showEmployees'])->name('/allEmployee');
    Route::get('deleteEmployee/{id}', [EmployeeController::class, 'destroy']);
    Route::get('viewEmployee/{id}', [EmployeeController::class, 'viewEmployee']);
    Route::get('editEmployee/{id}', [EmployeeController::class, 'edit']);
    Route::post('/updateEmployee/{id}', [EmployeeController::class, 'updateEmployee']);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::post('/admin_dashboard', [HomeController::class, 'dashboard'])->name('/admin_dashboard');


Route::group(['middleware' => ['checkLoggedIn']], function () {
    Route::get('/employee', [HomeController::class, 'employee']);
    Route::get('/nonEmployee', [HomeController::class, 'nonEmployee']);


});






