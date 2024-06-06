<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rute untuk halaman admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');

// Rute untuk halaman user
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');


//pdf downloder
Route::get('/pdf/generate', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('pdf.generate');
Route::get('/pdf/generate1', [App\Http\Controllers\PengelolaanRuangController::class, 'generatePDF'])->name('pdf.generate1');
Route::get('/pdf/generate2', [App\Http\Controllers\PengelolaUserController::class, 'generatePDF'])->name('pdf.generate2');

//export Excel
Route::get('/excel/export', [App\Http\Controllers\PinjamRuangController::class, 'exportExcel'])->name('excel.export1');


//pinjamruang
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pinjam_ruang', [App\Http\Controllers\PinjamRuangController::class, 'index'])->name('pinjam_ruang');
Route::post('/pinjam_ruang_simpan', [App\Http\Controllers\PinjamRuangController::class, 'simpan'])->name('pinjam_ruang_simpan');
Route::get('/pinjamruang/{no}/edit',[App\Http\Controllers\PinjamRuangController::class, 'edit'])->name('pinjamruang.edit');
Route::put('/pinjamruang/{no}', [App\Http\Controllers\PinjamRuangController::class, 'update'])->name('pinjamruang.update');
Route::delete('/pinjamruang/{no}', [App\Http\Controllers\PinjamRuangController::class, 'destroy'])->name('pinjamruang.destroy');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');


// Route::get('/angsuran', [App\Http\Controllers\AngsuranController::class, 'index'])->name('angsuran');
// Route::post('/angsur_simpan', [App\Http\Controllers\AngsuranController::class, 'simpan'])->name('pinjam_ruang_simpan');
// Route::delete('/angsuran/{no}', [App\Http\Controllers\AngsuranController::class, 'destroy'])->name('angsuran.destroy');
//pengelolaan ruang
Route::get('/pengolahan_ruang', [App\Http\Controllers\PengelolaanRuangController::class, 'index'])->name('pengolahan_ruang');
Route::post('/pengolahan_simpan', [App\Http\Controllers\PengelolaanRuangController::class, 'simpan'])->name('pengelolaan_ruang_simpan');
Route::delete('/pengolahan/{no}', [App\Http\Controllers\PengelolaanRuangController::class, 'destroy'])->name('pengolahan.destroy');

//akun user
Route::get('/user_pengolahan', [App\Http\Controllers\PengelolaUserController::class, 'index'])->name('user_pengolahan');
Route::post('/user_simpan', [App\Http\Controllers\PengelolaUserController::class, 'simpan'])->name('user_ruang_simpan');
Route::get('/user/{no}/edit',[App\Http\Controllers\PengelolaUserController::class, 'edit'])->name('user.edit');
Route::put('/user/{no}', [App\Http\Controllers\PengelolaUserController::class, 'update'])->name('user.update');
Route::put('/user/{no}', [App\Http\Controllers\PengelolaUserController::class, 'update'])->name('user.update');
Route::delete('/user/{no}', [App\Http\Controllers\PengelolaUserController::class, 'destroy'])->name('user.destroy');
Route::post('/upload', [App\Http\Controllers\PengelolaanRuangController::class, 'upload'])->name('upload');


// user
Route::get('/userpinjam_ruang', [App\Http\Controllers\UserPinjamController::class, 'index'])->name('userpinjam_ruang');
Route::post('/pinjam_user_simpan', [App\Http\Controllers\UserPinjamController::class, 'simpan'])->name('pinjam_user_simpan');
Route::post('/ajukan-peminjaman', [App\Http\Controllers\UserPinjamController::class, 'ajukanPeminjaman'])->name('ajukan-peminjaman');
Route::post('/persetujuan/{no}', [App\Http\Controllers\PinjamRuangController::class, 'persetujuan'])->name('persetujuan');