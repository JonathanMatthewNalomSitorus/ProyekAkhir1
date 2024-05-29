<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\informasiController;
use App\Http\Controllers\sekolahController;
use App\Http\Controllers\ErrorController;

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
Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);
});
Route::get('/register',[SesiController::class,'register'])->name('register');
Route::post('/register-proses',[SesiController::class,'register_proses'])->name('register-proses');


Route::get('/home',function(){
    return redirect('/admin');
});
Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/Admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/admin/User',[AdminController::class,'user'])->middleware('userAkses:user');
    Route::get('/logout',[SesiController::class,'logout']);
});

Route::get('/informasi', [InformasiController::class, 'informasi'])->name('informasi.index');
Route::get('/informasi/input',[informasiController::class,'input']);
Route::post('/informasi/store', [informasiController::class, 'store']);
Route::get('/beranda',[informasiController::class,'beranda']);
Route::get('/edit/{id}', [InformasiController::class, 'edit'])->name('informasi.edit');
Route::put('/update/{id}', [InformasiController::class, 'update'])->name('informasi.update');
Route::put('/informasi/{id}', [InformasiController::class, 'update'])->name('informasi.update');

Route::get('/sekolah',[sekolahController::class,'data']);
Route::get('/sekolah/input',[sekolahController::class,'input']);
Route::post('/sekolah/store',[sekolahController::class,'store']);
Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');

Route::delete('/hapus/{id}', [InformasiController::class, 'hapus'])->name('informasi.hapus');
Route::delete('/sekolah/hapus/{id}', [SekolahController::class, 'hapus'])->name('sekolah.hapus');
Route::delete('/gallery/hapus/{id}', [galleryController::class, 'hapus'])->name('gallery.hapus');

Route::get('/gallery/input',[galleryController::class,'input']);
Route::post('/gallery/store',[galleryController::class,'store']);
Route::get('/gallery', [galleryController::class, 'gallery'])->name('gallery.index');
Route::get('/gallery/{id}/edit', [galleryController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/{id}', [galleryController::class, 'update'])->name('gallery.update');

Route::get('/errorhandling', [ErrorController::class, 'index']);