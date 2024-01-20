<?php

use App\Http\Controllers\KategoriC;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserC;
use App\Http\Controllers\ProdukC;
use App\Http\Controllers\TransaksiC;
use App\Http\Controllers\LoginC;

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

Route::controller(LoginC::class)->group(function () {
    Route::get('login','login')->name('login');
    Route::post('login','loginAksi')->name('login.aksi');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::middleware('auth')->group(function(){
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('users')->controller(UserC::class)->group(function(){
    Route::get('', 'index')->name('users');
    Route::get('create', 'create')->name('users.create');
    Route::post('create/store', 'store')->name('users.store');
    Route::get('edit/{id}', 'edit')->name('users.edit');
    Route::post('edit/{id}', 'update')->name('users.update');
    Route::get('destroy/{id}', 'destroy')->name('users.destroy');
});

Route::prefix('kategori')->controller(KategoriC::class)->group(function(){
    Route::get('', 'index')->name('kategori');
    Route::get('create', 'create')->name('kategori.create');
    Route::post('create/store', 'store')->name('kategori.store');
    Route::get('edit/{id}', 'edit')->name('kategori.edit');
    Route::post('edit/{id}', 'update')->name('kategori.update');
    // Route::get('destroy/{id}', 'destroy')->name('users.destroy');
});

Route::prefix('produk')->controller(ProdukC::class)->group(function(){
    Route::get('/', 'index')->name('produk');
    Route::get('create', 'create')->name('produk.create');
    Route::post('create/store', 'store')->name('produk.store');
    Route::get('edit/{id}', 'edit')->name('produk.edit');
    Route::post('edit/{id}', 'update')->name('produk.update');
    Route::get('destroy/{id}', 'destroy')->name('produk.destroy');
});

Route::prefix('transaksi')->controller(TransaksiC::class)->group(function(){
    Route::get('/', 'index')->name('transaksi');
    Route::get('create', 'create')->name('transaksi.create');
    Route::post('create/store', 'store')->name('transaksi.store');
    // Route::get('edit/{id}', 'edit')->name('transaksi.edit');
    // Route::post('edit/{id}', 'update')->name('transaksi.update');
    // Route::get('destroy/{id}', 'destroy')->name('transaksi.destroy');
});
});
