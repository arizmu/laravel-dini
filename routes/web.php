<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\WisataController;
use App\Livewire\Chart\ChartIndex;
use App\Livewire\Chart\ChartList;
use App\Livewire\Chart\ChartPembayaran;
use App\Livewire\Chart\ChartTiketAktif;
use App\Livewire\Chart\ChartTiketExp;
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

Route::view('/', 'index');
Route::get('detail/{key}', [HomeController::class, 'wisata'])->name('wisata.detail');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::resource('wisata', WisataController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('tiketing', TiketController::class, ['except' => [
        // 'index',
        // 'create',
        // 'store',
        // 'edit',
        // 'destroy',
        // 'udpated',
        'show'
    ]]);

    Route::prefix('tiket')->group(function () {
        // Route::get('/chart', ChartIndex::class)->name('chart.index');
        Route::get('/list', ChartList::class)->name('chart.list');
        Route::get('/bayar', ChartPembayaran::class)->name('chart.bayar');
        Route::get('/aktif', ChartTiketAktif::class)->name('chart.aktif');
        Route::get('/exp', ChartTiketExp::class)->name('chart.exp');
    });

    Route::get('/get-harga/{id}', [TransaksiController::class, 'getHarga']); //JSON
});

Route::get('/tiket/detail/{key}', [TiketController::class, 'detailTiket'])->name('tiket.detail');
Route::get('/add/chart/{key}', [TiketController::class, 'addChart'])->name('add.chart.tiket')->middleware('auth');
Route::post('/bayar/action', [TiketController::class, 'bayar'])->name('tiket.bayar');
Route::get('cetak/{key}', [TiketController::class, 'cetak'])->name('cetak.tiket');
Route::get('validasi/tiket', [TiketController::class, 'validasi'])->name('tiket.validasi');
Route::get('/validasi/proses/{key}', [TiketController::class, 'validasiProses'])->name('tiket.validasi.proses');
Route::get('/tiket/dt/{key}', [TiketController::class, 'tiketTransaksiDetail'])->name('tiket.detail.key');
Route::get('/lihat/tiket/detail/{key}', [TiketController::class, 'lihatTiket'])->name('tiket.lihat.detail');


Route::get('/logout', function () {
    auth()
        ->guard('web')
        ->logout();

    session()->invalidate();
    session()->regenerateToken();
    return to_route('login');
})->middleware('auth');

require __DIR__ . '/auth.php';
