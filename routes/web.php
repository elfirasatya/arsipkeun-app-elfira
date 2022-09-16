<?php

use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('arsip-surat', ArsipController::class);
Route::get('/about',function(){
    return view('about');
});
Route::get('/arsip-surat/download/{id}',[ArsipController::class,'download']);
Route::get('/arsip-surat/view_pdf/{filename}',[ArsipController::class,'view_pdf']);
