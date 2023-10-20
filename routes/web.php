<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;
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

Route::get('/', [productcontroller::class,'index'])->name('products.index');
Route::get('create', [productcontroller::class,'create'])->name('products.create');
Route::post('store', [productcontroller::class,'store'])->name('products.store');
Route::get('products/{id}/edit',[productcontroller::class,'edit']);
Route::put('{id}/update',[productcontroller::class,'update']);
Route::get('products/{id}/delete',[productcontroller::class,'destroy']);
Route::get('/{id}/show',[productcontroller::class,'show']);