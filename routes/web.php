<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

// Route::get('/', function () {
//      return view('admin');
// });

//crud tabel product

Route::get('/',[CrudController::class,'index']);

Route::prefix('/')->group(function(){

Route::get('/create',[CrudController::class,'create']);
Route::get('/store',[CrudController::class,'store']);
Route::get('/read',[CrudController::class,'read']);
Route::get('/show/{id}',[CrudController::class,'show']);
Route::get('/update/{id}',[CrudController::class,'update']);
Route::get('/destroy/{id}',[CrudController::class,'destroy']);

});
//crud tabel kategori

//crud tabel tipe

//crud tabel alur