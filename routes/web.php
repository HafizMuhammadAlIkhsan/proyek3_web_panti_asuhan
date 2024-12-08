<?php

use App\Models\DonasiBarang;
use Illuminate\Support\Facades\Route;

//Masyarakat Umum
use App\Http\Controllers\Donatur\RegisterController;
use App\Http\Controllers\Donatur\AuthController as AuthDonatur;
use App\Http\Controllers\Admin\AuthController as AuthAdmin;

//Donasi
use App\Http\Controllers\DonasiJasaController;
use App\Http\Controllers\DonasiUangController;
//Data Anak
use App\Http\Controllers\dataAnakController;

//Berita
use App\Http\Controllers\BeritaController;
//DataPanti
use App\Http\Controllers\PantiAsuhanController;
use App\Http\Controllers\RekeningController;

//PrograpPanti
use App\Http\Controllers\ProgramPantiController;
//Unused?
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AkunAdminController;
use App\Http\Controllers\HalamanDonasiController;
use App\Http\Controllers\DonasiBarangController;
use App\Models\DonasiUang;
use Faker\Guesser\Name;

//Landing Page
Route::get('/', function () {
    return view('Masyarakat_Umum/beranda_masyarakat_umum');
})->name('beranda_umum');

Route::get('/Login', function () {
    return view('Masyarakat_Umum/login');
});

Route::get('/register_step1', [RegisterController::class, 'showRegister1'])->name('register.step1');
Route::post('/register_step1', [RegisterController::class, 'postRegister1'])->name('register.step1.post');
Route::get('/register_step2', [RegisterController::class, 'showRegister2'])->name('register.step2');
Route::post('/register_step2', [RegisterController::class, 'postRegister2'])->name('register.step2.post');
Route::get('/login', [AuthDonatur::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthDonatur::class, 'login']);
Route::get('/', function () {return view('Masyarakat_Umum/beranda_masyarakat_umum');})->name('beranda_umum');
Route::get('/Halaman_Donasi_Umum', function () {return view('Masyarakat_Umum/beranda_donasi_masyarakat_umum');})->name('hal_donasi_umum');

Route::get('/data_anak', [dataAnakController::class, 'index_masyarakat'])->name('masyarakat-data-anak');


//Berita_______________________________________________________________________________________________________________
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Insert Donasi Uang Umum_______________________________________________________________________________________________________________

Route::post('/Donasi_Uang_Umum', [DonasiUangController::class, 'store'])->name('insert_donasi_uang');
Route::get('/Donasi_Uang_Umum', function () {return view('Masyarakat_Umum/masyarakat_umum_donasi_uang_tunai');})->name('donasi_uang_umum');
Route::get('/Donasi_Uang_Umum', [DonasiUangController::class, 'FormUmum'])->name('form_donasi_uang');
//______________________________________________________________________________________________________________________
//Donatur



Route::get('donatur/data_anak', [dataAnakController::class, 'index_donatur'])->name('donatur-data-anak')->middleware('CheckDonaturAccess');

// // Route untuk beranda donatur
// Route::get('/beranda-donatur', [DonaturController::class, 'index'])->name('beranda_donatur');

// // Route untuk halaman donasi
// Route::get('/hal-donasi', [DonasiController::class, 'index'])->name('hal_donasi');

// // Route untuk halaman donasi jasa
// Route::get('/hal-donasi-jasa', [DonasiController::class, 'jasaIndex'])->name('hal_donasi_jasa');

// Route::get('/donatur/{email}', [DonaturController::class, 'show']);

//Riwayat___________________________________________________________________________
Route::get('/riwayat_donasi_jasa', function () {
    return view('Donatur/riwayat_donasi_jasa');
})->name('riwayat_donasi_jasa');

Route::get('/riwayat_donasi_jasa', [DonasiJasaController::class, 'AmbilDataJasa_Riwayat'])->name('riwayat_donasi_jasa');

Route::get('/riwayat_donasi_uang', [DonasiUangController::class, 'AmbilDataUang_Riwayat'])->name('riwayat_donasi_Uang');

//________________________________________________________________________________________________________________
Route::middleware(['CheckDonaturAccess'])->group(function () {
    Route::post('/donatur/logout', [AuthDonatur::class, 'logout'])->name('donatur.logout');
    Route::get('/beranda_donatur', function () {return view('Donatur/beranda_donatur');})->name('beranda_donatur');
    Route::get('/Halaman_Donasi', function () {return view('Donatur/beranda_donasi');})->name('hal_donasi_donatur');
    Route::get('/donatur_donasi_jasa', function () {return view('Donatur/donatur_donasi_jasa',);})->name('hal_donasi_jasa');
    Route::get('/donatur_donasi_barang', function () {$data = DonasiBarang::all();return view('Donatur/donatur_donasi_barang', compact('data'));})->name('hal_donasi_barang');
    Route::get('/katalog_program', [ProgramPantiController::class, 'katalog'])->name('katalog_program');
    Route::get('/katalog_berita', [BeritaController::class, 'Katalog'])->name('katalog_berita');
    Route::post('/donatur_donasi_barang', [DonasiController::class, 'donasi_barang'])->name('post.donasi.barang');
    Route::get('/profile_donatur', [DonaturController::class, 'showProfile'])->name('hal_profile_donatur.show');
    Route::put('/profile_donatur', [DonaturController::class, 'updateProfile'])->name('hal_profile_donatur.update');
});

Route::middleware(['CheckDonaturAccess'])->group(function () {
    Route::get('/Riwayat_Donasi', [DonaturController::class, 'RiwayatDonasi'])->name('RiwayatDonasi_donasi');
    Route::get('/Donasi_Uang_Umum_Donatur', [DonasiUangController::class, 'FormDonatur'])->name('form_donasi_uang_donatur');
    Route::post('/Donasi_Uang_Donatur', [DonasiUangController::class, 'store_donatur'])->name('insert_donasi_uang_donatur');
});



//______________________________________________________________________________________________________________________
//Admin

Route::get('/login_admin', [AuthAdmin::class, 'showLoginForm'])->name('login_admin');
Route::post('/login_admin', [AuthAdmin::class, 'login']);

//Beranda
Route::middleware(['CheckAdminAccess'])->group(function () {
    Route::post('/logout_admin', [AuthAdmin::class, 'logout'])->name('admin.logout');
    Route::get('/beranda_admin', [AdminController::class, 'BerandaAdmin'])->name('hal_beranda_admin');
    Route::get('/Beranda_Donasi', [AdminController::class, 'BerandaDonasi'])->name('hal_beranda_donasi_admin');
    Route::get('/Beranda_Berita', function () {return view('Admin/beranda_berita_admin');})->name('hal_beranda_berita_admin');
    Route::get('/Beranda_Program', function () {return view('Admin/beranda_program_admin');})->name('hal_beranda_program_admin');
});


//Program
Route::middleware(['CheckAdminAccess'])->group(function () {
    Route::get('/input_program', function () {return view('Admin/input_program');})->name('insert-program');
    Route::get('/list_program', [ProgramPantiController::class, 'AmbilDataProgram_Admin'])->name('list-program');
    Route::post('/input_program', [ProgramPantiController::class, 'store'])->name('program.insert');
    Route::put('/list_program', [ProgramPantiController::class, 'update'])->name('program.update');
    Route::delete('/list_program', [ProgramPantiController::class, 'destroy'])->name('program.delete');
});

//Jasa
Route::middleware(['CheckAdminAccess'])->group(function () {
    Route::get('/donasi_jasa/{id}', [DonasiJasaController::class, 'show']);
    Route::put('/donasi_jasa/{id}', [DonasiJasaController::class, 'UpdateDataJasa'])->name('jasa.update');
    Route::delete('/donasi_jasa/{id}', [DonasiJasaController::class, 'HapusDataJasa'])->name('jasa.delete');

    Route::get('/beranda_jasa_admin', function () {
        return view('Admin/beranda_jasa_admin');
    })->name('hal_beranda_jasa_admin')->middleware('CheckAdminAccess');;

    Route::get('/input_jasa', function () {
        return view('Admin/input_jasa');
    })->name('input-jasa');

    Route::get('/list_jasa', [DonasiJasaController::class, 'AmbilDataJasa_Admin'])->name('list-jasa');
    Route::post('admin/input_jasa', [DonasiJasaController::class, 'store'])->name('jasa.insert');
});

//Barang
Route::middleware(['CheckAdminAccess'])->group(function () {
    Route::get('/donasi_barang/{id}', [DonasiBarangController::class, 'detail']);
    Route::put('/donasi_barang/{id}', [DonasiBarangController::class, 'update_status'])->name('barang.status');
    Route::delete('/donasi_barang/{id}', [DonasiBarangController::class, 'destroy'])->name('barang.delete');
    Route::get('/list_barang', [DonasiBarangController::class, 'index'])->name('list-barang');
});

//Berita
Route::middleware(['CheckAdminAccess'])->group(function () {

    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    Route::get('/input_berita', function () {
        return view('Admin/input_berita');
    })->name('input_berita');

    Route::get('/list_berita', [BeritaController::class, 'AmbilDataBerita_Admin'])->name('list-berita');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.insert');
});

//Uang
Route::middleware(['CheckAdminAccess'])->group(function () {


});

//Data Panti
Route::middleware(['CheckAdminAccess'])->group(function () {

    Route::get('/Beranda_DataPanti', function () {
        return view('Admin/beranda_datapanti_admin');
    })->name('hal_beranda_data_panti');


    Route::get('/input_rekening', function () {
        return view('Admin/input_rekening');
    })->name('input_rekening');

    Route::get('/list_rekening', [RekeningController::class, 'AmbilListRekening'])->name('list_rekening');
    Route::post('/rekening', [RekeningController::class, 'store'])->name('rekening.store');
    Route::put('/rekening/{id}/update-status', [RekeningController::class, 'updateStatus'])->name('rekening.update');
    Route::delete('/rekening/{id}/delete', [RekeningController::class, 'delete'])->name('rekening.delete');
    
    Route::get('/panti/edit', [PantiAsuhanController::class, 'edit'])->name('panti.edit');
    Route::put('/panti/update', [PantiAsuhanController::class, 'update'])->name('panti.update');

});



// Uang Di Admin___________________________________________________________________________________________________________________________

Route::get('/list_uang', [DonasiUangController::class, 'AmbilDataUang_Admin'])->name('list-uang');
Route::put('/donasi_uang/{id}', [DonasiUangController::class, 'UpdateDataUang'])->name('uang.update');
Route::delete('/donasi_uang/{id}', [DonasiUangController::class, 'HapusDataUang'])->name('uang.delete');

// JASA Di Admin___________________________________________________________________________________________________________________________



//Program_________________________________________________________________________________________________________________________________________

Route::get('/program', [ProgramPantiController::class, 'index'])->name('program.index');
Route::get('/program/{id}', [ProgramPantiController::class, 'show'])->name('program.show');
//_________________________________________________________________________________________________________________________________________

Route::get('admin/data_anak', [dataAnakController::class, 'index'])->name('admin-data-anak')->middleware('CheckAdminAccess');
Route::get('admin/data_anak/create', [dataAnakController::class, 'create'])->name('admin-data-anak-create')->middleware('CheckAdminAccess');
Route::post('admin/data_anak/store', [dataAnakController::class, 'store'])->name('admin-data-anak-store')->middleware('CheckAdminAccess');
Route::get('admin/data_anak/{id}/edit', [dataAnakController::class, 'updateView'])->name('admin-data-anak-edit-view')->middleware('CheckAdminAccess');
Route::post('admin/data_anak/{id}', [dataAnakController::class, 'update'])->name('admin-data-anak-edit')->middleware('CheckAdminAccess');
Route::delete('admin/data_anak/{id}', [dataAnakController::class, 'destroy'])->name('admin-data-anak-delete')->middleware('CheckAdminAccess');

// Route::get('/Beranda_Donasi_Admin', function () {
//     return view('Admin/beranda_donasi_admin');
// })->name('detail_barang');

Route::get('/Detail_Barang', function () {
    $donasi_barang = DonasiBarang::all();
    return view('Admin/detail_barang', compact('donasi_barang'));
});

Route::middleware(['CheckManagerAccess'])->group(function () {
    Route::get('/admin/create_admin', function () {return view('Admin/create_admin');})->name('create_admin.show');
    Route::post('/admin/create_admin', [AdminController::class, 'store'])->name('create_admin.insert');
    Route::get('/admin/list_akun_admin', [AdminController::class, 'listAdmins'])->name('admin.list');
    Route::put('/admin/update_admin/{email}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete_admin/{email}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/admin/beranda_create_admin', function () {return view('Admin/beranda_create_admin');})->name('beranda_create_admin');
});

Route::post('/donasi-barang', [DonasiController::class, 'donasi_barang'])->name('post.donasi.barang');
// Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('/admin/donasi-barang', [DonasiBarangController::class, 'index'])->name('admin.donasi.index');
//     Route::get('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'show'])->name('admin.donasi.show');
//     Route::get('/admin/donasi-barang/{id}/edit', [DonasiBarangController::class, 'edit'])->name('admin.donasi.edit');
//     Route::put('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'update'])->name('admin.donasi.update');
//     Route::get('/admin/donasi-barang/{id}/detail', [DonasiBarangController::class, 'detail'])->name('admin.donasi.detail');
//     Route::post('/admin/donasi-barang/{id}/approve', [DonasiBarangController::class, 'approve'])->name('admin.donasi.approve');
//     Route::post('/admin/donasi-barang/{id}/reject', [DonasiBarangController::class, 'reject'])->name('admin.donasi.reject');
// });

// Route::get('/admin/donasi-barang/{id}/detail', [DonasiBarangController::class, 'detail']);
// Route::post('/admin/donasi-barang/{id}/approve', [DonasiBarangController::class, 'approve']);
// Route::post('/admin/donasi-barang/{id}/reject', [DonasiBarangController::class, 'reject']);
// Route::get('/Detail_Barang', [DonasiBarangController::class, 'detail'])->name('detail.barang');

// Route::middleware(['auth', 'admin'])->group(function () {
//     // List dan operasi dasar
//     Route::get('/admin/donasi-barang', [DonasiBarangController::class, 'index'])
//         ->name('admin.donasi.index');
    
//     // Detail via AJAX
//     Route::get('/admin/donasi-barang/{id}/detail', [DonasiBarangController::class, 'detail'])
//         ->name('admin.donasi.detail');
    
//     // Approve dan Reject
//     Route::post('/admin/donasi-barang/{id}/approve', [DonasiBarangController::class, 'approve'])
//         ->name('admin.donasi.approve');
//     Route::post('/admin/donasi-barang/{id}/reject', [DonasiBarangController::class, 'reject'])
//         ->name('admin.donasi.reject');
//     Route::post('/admin/donasi-barang/approve-selected', [DonasiBarangController::class, 'approveSelected'])
//         ->name('admin.donasi.approve-selected');
    
//     // CRUD operations
//     Route::get('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'show'])
//         ->name('admin.donasi.show');
//     Route::get('/admin/donasi-barang/{id}/edit', [DonasiBarangController::class, 'edit'])
//         ->name('admin.donasi.edit');
//     Route::put('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'update'])
//         ->name('admin.donasi.update');
//     Route::delete('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'destroy'])
//         ->name('admin.donasi.destroy');
// });

// Route::get('/masyarakat_umum_donasi_uang_tunai', function () {
//     return view('Masyarakat_Umum/masyarakat_umum_donasi_uang_tunai');
// });

// // // Group route dengan middleware auth dan admin
// // Route::middleware(['auth', 'admin'])->group(function () {
// //     // Halaman utama donasi barang
// //     Route::get('/Detail_Barang', [DonasiBarangController::class, 'index'])->name('admin.donasi.index');
    
// //     // Route untuk detail donasi (modal)
// //     Route::get('/admin/donasi-barang/{id}/detail', [DonasiBarangController::class, 'detail'])
// //         ->name('admin.donasi.detail');
    
// //     // Route untuk approve/reject
// //     Route::post('/admin/donasi-barang/{id}/diterima', [DonasiBarangController::class, 'approve'])
// //         ->name('admin.donasi.approve');
// //     Route::post('/admin/donasi-barang/{id}/dibatalkan', [DonasiBarangController::class, 'reject'])
// //         ->name('admin.donasi.reject');
    
// //     // Route untuk approve multiple
// //     Route::post('/admin/donasi-barang/approve-selected', [DonasiBarangController::class, 'approveSelected'])
// //         ->name('admin.donasi.approve-selected');
    
// //     // Route CRUD standard
// //     Route::get('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'show'])
// //         ->name('admin.donasi.show');
// //     Route::get('/admin/donasi-barang/{id}/edit', [DonasiBarangController::class, 'edit'])
// //         ->name('admin.donasi.edit');
// //     Route::put('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'update'])
// //         ->name('admin.donasi.update');
// //     Route::delete('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'destroy'])
// //         ->name('admin.donasi.destroy');
// // });