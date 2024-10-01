<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DonasiJasaController;

Route::get('/login', [LoginAdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginAdminController::class, 'login']);

Route::post('/donasi-jasa/store', [DonasiJasaController::class, 'store'])->name('donasi-jasa.store');


Route::get('/input_jasa', function () {
    return view('input_jasa');
});

Route::get('/list_jasa', function () {
    return view('list_jasa');
});

Route::get('/beranda', function () {
    return view('beranda_jasa_admin');
})->name('beranda');


Route::get('/Beranda Umum', function () {
    return view('beranda_masyarakat_umum');
})->name('beranda_umum');

Route::get('/beranda donatur', function () {
    return view('beranda_donatur');
})->name('beranda_donatur');

Route::get('/Halaman Donasi', function () {
    return view('beranda_donasi');
})->name('hal_donasi');

Route::get('/Halaman Donasi Jasa', function () {
    return view('donatur_donasi_jasa');
})->name('hal_donasi_jasa');

Route::get('/Login', function () {
    return view('login');
});

Route::get('/Login Admin', function () {
    return view('loginadmin');
});

Route::get('/Register1', function () {
    return view('register1');
});

Route::get('/Register2', function () {
    return view('register2');
});