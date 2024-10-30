<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DatajualController;
use App\Http\Controllers\LoginController;
use App\Models\Datajual;
use App\Models\Produk;
use Illuminate\Auth\Events\Login;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::middleware('auth')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::post('/update', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });

    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
        Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::post('/update', [ProdukController::class, 'update'])->name('produk.update');
        Route::get('/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });

    Route::prefix('datajual')->group(function () {
        Route::get('/', [DatajualController::class, 'index'])->name('datajual.index');
        Route::get('/create', [DatajualController::class, 'create'])->name('datajual.create');
        Route::post('/store', [DatajualController::class, 'store'])->name('datajual.store');
        Route::get('/edit/{id}', [DatajualController::class, 'edit'])->name('datajual.edit');
        Route::get('/show/{id}', [DatajualController::class, 'show'])->name('datajual.show');
        Route::post('/update/{id}', [DatajualController::class, 'update'])->name('datajual.update');
        Route::get('/delete/{id}', [DatajualController::class, 'destroy'])->name('datajual.destroy');
    });
});



