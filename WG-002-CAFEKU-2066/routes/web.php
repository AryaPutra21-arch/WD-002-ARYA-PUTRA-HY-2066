<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //route untuk menampilkan page setelah login menuju ke homecontroller

Route::get('/', [MenuController::class, 'berandadepan'])->name('/'); //route untuk menampilkan halaman beranda ketika akses awal tanpa login

Route::middleware(['auth','owner'])->group(function(){ // berfungsi untuk grouping middlware, hanya role 'owner' yang dapat mengakses route di dalam group ini.
    Route::resource('user', UserController::class); //route resource menuju user controller dengan redirect 'user'
});

Route::middleware(['auth'])->group(function(){ // berfungsi untuk grouping middlware, hanya role 'admin' yang dapat mengakses route di dalam group ini.
    Route::resource('kategori', KategoriController::class);//route resource dari kategoricontroller dengan redirect 'kategori
    Route::resource('menu', MenuController::class); //route resource dari menucontroller dengan redirect 'menu'


    Route::get('dashboard', [OrderController::class,'index'])->name('dashboard'); //route untuk menampilkan halaman dashboard dan menampilkan halaman inputan
    Route::post('dashboard', [OrderController::class,'hitung'])->name('dashboard'); //route untuk menampilkan hasil dari inputan method hitung pada ordercontroller di dashboard

});



