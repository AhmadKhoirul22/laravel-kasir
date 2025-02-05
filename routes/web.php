<?php

use App\Http\Controllers\Auth_Controller;
use App\Http\Controllers\Dashboard_Controller;
use App\Http\Controllers\Kategori_Controller;
use App\Http\Controllers\Produk_Controller;
use App\Http\Controllers\User_Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login',[Auth_Controller::class,'index'])->name('login');


Route::get('/',[Dashboard_Controller::class,'index'])->name('dashboard');

// route user
Route::get('/user',[User_Controller::class,'index'])->name('user-index');
Route::post('/user/store',[User_Controller::class,'store'])->name('user.store');
Route::delete('user/destroy/{id}',[User_Controller::class,'destroy'])->name('user.destroy');
Route::put('user/update/{id}',[User_Controller::class,'update'])->name('user.update');

Route::get('/kategori',[Kategori_Controller::class,'index'])->name('kategori-index');
Route::post('/kategori/store',[Kategori_Controller::class,'store'])->name('kategori.store');
Route::delete('kategori/destroy/{id}',[Kategori_Controller::class,'destroy'])->name('kategori.destroy');
Route::put('kategori/update/{id}',[Kategori_Controller::class,'update'])->name('kategori.update');

Route::get('/produk',[Produk_Controller::class,'index'])->name('produk-index');
Route::post('/produk/store',[Produk_Controller::class,'store'])->name('produk.store');
Route::delete('produk/destroy/{id}',[Produk_Controller::class,'destroy'])->name('produk.destroy');
Route::put('produk/update/{id}',[Produk_Controller::class,'update'])->name('produk.update');


// Route::get('/template', function () {
//     return file_get_contents(public_path('midone/dist/index.html'));
// });
