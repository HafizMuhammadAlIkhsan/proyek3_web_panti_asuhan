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
});

Route::get('/Donasi', function () {
    return view('beranda_donasi');
});

Route::get('/Login', function () {
    return view('login');
});