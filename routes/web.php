<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda_jasa_admin');
});

Route::get('/', function () {
    return view('beranda_donatur');
})->name('beranda_donatur');

Route::get('/Halaman Donasi', function () {
    return view('beranda_donasi');
})->name('hal_donasi');

Route::get('/Login', function () {
    return view('login');
});

Route::get('/Register1', function () {
    return view('register1');
});

Route::get('/Register2', function () {
    return view('register2');
});