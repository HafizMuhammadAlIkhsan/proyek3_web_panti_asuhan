<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DonasiJasaController;

Route::get('/login', [LoginAdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginAdminController::class, 'login']);

Route::post('/donasi-jasa/store', [DonasiJasaController::class, 'store'])->name('donasi-jasa.store');


Route::get('/input_jasa', function () {
    return view('Admin/input_jasa');
});

Route::get('/list_jasa', function () {
    return view('Admin/list_jasa');
});

Route::get('/beranda', function () {
    return view('Admin/beranda_jasa_admin');
})->name('beranda');


Route::get('/', function () {
    return view('Masyarakat_Umum/beranda_masyarakat_umum');
})->name('beranda_umum');

Route::get('/beranda_donatur', function () {
    return view('Donatur/beranda_donatur');
})->name('beranda_donatur');

Route::get('/Halaman_Donasi', function () {
    return view('Donatur/beranda_donasi');
})->name('hal_donasi');

Route::get('/Halaman_Donasi_Jasa', function () {
    return view('Donatur/donatur_donasi_jasa');
})->name('hal_donasi_jasa');

Route::get('/Login', function () {
    return view('Masyarakat_Umum/login');
});

Route::get('/Login_Admin', function () {
    return view('Admin/loginadmin');
});

Route::get('/Register1', function () {
    return view('Masyarakat_Umum/register1');
});

Route::get('/Register2', function () {
    return view('Masyarakat_Umum/register2');
});