<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trielcontroller;
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

Route::get('index',[trielcontroller::class,"index"])->name('index');
Route::post('loginpage',[trielcontroller::class,"loginpage"])->name('loginpage');
Route::get('create',[trielcontroller::class,"create"])->name('create');
Route::post('store',[trielcontroller::class,"store"])->name('store');

Route::get('list',[trielcontroller::class,"show"])->name('list');

Route::get('edit/{id}',[trielcontroller::class,'update'])->name('edit');
Route::post('update/{id}',[trielcontroller::class,'update'])->name('update');
Route::get('searchdata',[trielcontroller::class,'searchdata'])->name('searchdata');

Route::get('destroy',[trielcontroller::class,'destroy'])->name('destroy');