<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaslonController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VoteResultController;

// Route untuk halaman landing
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Route untuk halaman paslon
Route::get('/paslon', [PaslonController::class, 'index'])->name('paslon');

// Route untuk halaman kategori
Route::get('/kategori', function () {
    return view('pages.kategori');
})->name('kategori');

// Route untuk halaman riwayat
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

// Route untuk resource peserta
Route::resource('peserta', PesertaController::class)->parameters([
    'peserta' => 'peserta'
]);

// Route untuk menyimpan vote
Route::post('/store-vote', [VoteController::class, 'store'])->name('storeVote');

// Route untuk halaman profil
Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');

// Route untuk halaman tambah
Route::get('/tambah', [App\Http\Controllers\TambahController::class, 'create'])->name('tambah');
Route::post('/tambah', [App\Http\Controllers\TambahController::class, 'store'])->name('tambah.store');

// Route untuk halaman voting
Route::get('/voting', [App\Http\Controllers\VoteResultController::class, 'index'])->name('voting');
