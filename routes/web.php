<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\WisataController;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('wisata', WisataController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('pembayaran', [TransaksiController::class, 'pembayaran'])->name('transaksi.pembayaran');
Route::post('pembayaran-proses', [TransaksiController::class, 'pembayaran_proses'])->name('transaksi.pembayaran.proses');

Route::get('/get-harga/{id}', [TransaksiController::class, 'getHarga']);


require __DIR__.'/auth.php';
