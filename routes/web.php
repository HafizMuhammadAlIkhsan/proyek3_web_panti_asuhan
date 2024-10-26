<?php
use Illuminate\Support\Facades\Route;

//Masyarakat Umum
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginDonaturController;

use App\Http\Controllers\DonaturController;

//Landing Page
Route::get('/', function () {
    return view('Masyarakat_Umum/beranda_masyarakat_umum');
})->name('beranda_umum');

//KeRegister1
Route::get('/Register1', function () {
    return view('Masyarakat_Umum/register1');
});
//KeRegister2
Route::get('/Register2', function () {
    return view('Masyarakat_Umum/register2');
});

Route::get('/Login', function () {
    return view('Masyarakat_Umum/login');
});

Route::get('/Halaman_Donasi_Umum', function () {
    return view('Masyarakat_Umum/beranda_donasi_masyarakat_umum');
})->name('hal_donasi_umum');

// Route untuk halaman register1 (tampilan form)
Route::get('/Register1', [RegisterController::class, 'showRegister1'])->name('register.step1');

// Route untuk proses register1 (menyimpan data dan pindah ke register2)
Route::post('/Register1', [RegisterController::class, 'postRegister1'])->name('register.step1.post');

// Route untuk halaman register2 (tampilan form)
Route::get('/Register2', [RegisterController::class, 'showRegister2'])->name('register.step2');

// Route untuk proses register2 (menyimpan data tambahan)
Route::post('/Register2', [RegisterController::class, 'postRegister2'])->name('register.step2.post');

Route::get('/login', [LoginDonaturController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginDonaturController::class, 'login']);
Route::post('/logout', [LoginDonaturController::class, 'logout'])->name('logout');

//______________________________________________________________________________________________________________________
//Donatur
use App\Http\Controllers\DonasiController;

// Route untuk beranda donatur
Route::get('/beranda-donatur', [DonaturController::class, 'index'])->name('beranda_donatur');

// Route untuk halaman donasi
Route::get('/hal-donasi', [DonasiController::class, 'index'])->name('hal_donasi');

// Route untuk halaman donasi jasa
Route::get('/hal-donasi-jasa', [DonasiController::class, 'jasaIndex'])->name('hal_donasi_jasa');

Route::get('/donatur/{email}', [DonaturController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda_donatur', function () {
        return view('Donatur/beranda_donatur');
    })->name('beranda_donatur');

    Route::get('/Halaman_Donasi', function () {
        return view('Donatur/beranda_donasi');
    })->name('hal_donasi_donatur');

    Route::get('/Halaman_Donasi_Jasa', function () {
        return view('Donatur/donatur_donasi_jasa');
    })->name('hal_donasi_jasa');
});

Route::get('/donatur_donasi_jasa', function () {
    return view('Donatur/donatur_donasi_jasa');
})->name('hal_donasi_jasa');



//______________________________________________________________________________________________________________________
//Admin
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DonasiJasaController;
use App\Http\Controllers\dataAnakController;

Route::get('/login', [LoginAdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginAdminController::class, 'login']);

Route::get('/Login_Admin', function () {
    return view('Admin/loginadmin');
});

Route::get('/Login_Admin', function () {
    return view('Admin/loginadmin');
});

Route::get('/Beranda_Admin', function () {
    return view('Admin/beranda_admin');
})->name('hal_beranda_admin');

Route::get('/Beranda_Admin2', function () {
    return view('Admin/beranda_donasi_admin');
})->name('hal_beranda_donasi_admin');

Route::get('/input_jasa', function () {
    return view('Admin/input_jasa');
});

Route::get('/list_jasa', function () {
    return view('Admin/list_jasa');
}); 
Route::post('/donasi-jasa/store', [DonasiJasaController::class, 'store'])->name('donasi-jasa.store');
Route::get('admin/data-anak', [dataAnakController::class, 'index'])->name('admin-data-anak');
Route::get('admin/data-anak/create', [dataAnakController::class, 'create'])->name('admin-data-anak-create');
Route::post('admin/data-anak/store', [dataAnakController::class, 'store'])->name('admin-data-anak-store');
// Route::get('admin/data-anak/{id}/edit', [dataAnakController::class, 'updateView'])->name('admin-data-anak-edit-view');
// Route::post('admin/data-anak/{id}', [dataAnakController::class, 'update'])->name('admin-data-anak-edit');
// Route::delete('admin/data-anak/{id}', [dataAnakController::class, 'destroy'])->name('admin-data-anak-delete');
    