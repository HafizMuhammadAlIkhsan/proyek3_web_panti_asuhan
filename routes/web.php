<?php
use Illuminate\Support\Facades\Route;

//Masyarakat Umum
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginDonaturController;
use App\Http\Controllers\LoginAdminController;

//Donasi
use App\Http\Controllers\DonasiJasaController;
use App\Http\Controllers\DonasiUangController;
//Data Anak
use App\Http\Controllers\dataAnakController;

//Berita
use App\Http\Controllers\BeritaController;

//Unused?
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
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

Route::get('/Register1', [RegisterController::class, 'showRegister1'])->name('register.step1');

Route::post('/Register1', [RegisterController::class, 'postRegister1'])->name('register.step1.post');

Route::get('/Register2', [RegisterController::class, 'showRegister2'])->name('register.step2');

Route::post('/Register2', [RegisterController::class, 'postRegister2'])->name('register.step2.post');

Route::get('/login', [LoginDonaturController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginDonaturController::class, 'login']);
Route::post('/logout', [LoginDonaturController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('Masyarakat_Umum/beranda_masyarakat_umum');
})->name('beranda_umum');

Route::get('/Halaman_Donasi_Umum', function () {
    return view('Masyarakat_Umum/beranda_donasi_masyarakat_umum');
})->name('hal_donasi_umum');

Route::get('/Donasi_Uang_Umum', function () {
    return view('Masyarakat_Umum/masyarakat_umum_donasi_uang_tunai');
})->name('donasi_uang_umum');

Route::get('/data_anak', [dataAnakController::class, 'index_masyarakat'])-> name('masyarakat-data-anak');

Route::get('/Berita', function () {
    return view('Masyarakat_Umum/katalog_berita');
})->name('donasi_uang_umum');

//Berita_______________________________________________________________________________________________________________

Route::get('/Berita', [BeritaController::class, 'index'])->name('berita.index');
Route::post('/input_berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/Berita/{id}', [BeritaController::class, 'show'])->name('berita.show');


// Insert Donasi Uang _______________________________________________________________________________________________________________
Route::post('/Donasi_Uang_Umum', [DonasiUangController::class, 'store'])->name('insert_donasi_uang_umum');

Route::post('/Donasi_Uang_Donatur', [DonasiUangController::class, 'store_donatur'])->name('insert_donasi_uang_donatur');
//______________________________________________________________________________________________________________________
//Donatur

Route::get('/Donasi_Uang_Donatur', function () {
    return view('Donatur/donatur_donasi_uang_tunai');
})->name('donasi_uang_Donatur');

Route::get('donatur/data_anak', [dataAnakController::class, 'index_donatur'])->name('donatur-data-anak');

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
Route::middleware(['isDonatur'])->group(function () {
    Route::get('/beranda_donatur', function () {
        return view('Donatur/beranda_donatur');
    })->name('beranda_donatur');

    Route::get('/Halaman_Donasi', function () {
        return view('Donatur/beranda_donasi');
    })->name('hal_donasi_donatur');

    Route::get('/donatur_donasi_jasa', function () {
        return view('Donatur/donatur_donasi_jasa');
    })->name('hal_donasi_jasa');
    
    Route::get('/donatur_donasi_barang', function () {
        return view('Donatur/donatur_donasi_barang');
    })->name('hal_donasi_barang');
});



//______________________________________________________________________________________________________________________
//Admin

Route::get('/Login_Admin', [LoginAdminController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/Login_Admin', [LoginAdminController::class, 'login']);

Route::get('/Beranda_Admin', function () {
    return view('Admin/beranda_admin');
})->name('hal_beranda_admin');

Route::get('/Beranda_Donasi', function () {
    return view('Admin/beranda_donasi_admin');
})->name('hal_beranda_donasi_admin');

Route::get('/input_berita', function () {
    return view('Admin/input_berita');
})->name('input_berita');

// Uang Di Admin___________________________________________________________________________________________________________________________

Route::get('/list_uang', [DonasiUangController::class, 'AmbilDataUang_Admin'])->name('hal_list_uang_admin');
Route::put('/donasi_uang/{id}', [DonasiUangController::class, 'UpdateDataUang'])->name('update_data_uang');
Route::delete('/donasi_uang/{id}', [DonasiUangController::class, 'HapusDataUang'])->name('hapus_data_uang');

// JASA Di Admin___________________________________________________________________________________________________________________________
Route::get('/donasi_jasa/{id}', [DonasiJasaController::class, 'show']);
Route::put('/donasi_jasa/{id}', [DonasiJasaController::class, 'UpdateDataJasa'])->name('update_data_jasa');
Route::delete('/donasi_jasa/{id}', [DonasiJasaController::class, 'HapusDataJasa'])->name('hapus_data_jasa');

Route::get('/Beranda_jasa_admin', function () {
    return view('Admin/beranda_jasa_admin');
})->name('hal_beranda_jasa_admin');

Route::get('/input_jasa', function () {
    return view('Admin/input_jasa');
})->name('input-jasa');

Route::get('/list_jasa', [DonasiJasaController::class, 'AmbilDataJasa_Admin'])->name('list-jasa');
Route::post('admin/input_jasa', [DonasiJasaController::class, 'store'])->name('insert-jasa');

//Berita_______________________________________________________________________________________________________________________________

Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');

//_________________________________________________________________________________________________________________________________________

Route::get('admin/data_anak', [dataAnakController::class, 'index'])->name('admin-data-anak');
Route::get('admin/data_anak/create', [dataAnakController::class, 'create'])->name('admin-data-anak-create');
Route::post('admin/data_anak/store', [dataAnakController::class, 'store'])->name('admin-data-anak-store');
Route::get('admin/data_anak/{id}/edit', [dataAnakController::class, 'updateView'])->name('admin-data-anak-edit-view');
Route::post('admin/data_anak/{id}', [dataAnakController::class, 'update'])->name('admin-data-anak-edit');
Route::delete('admin/data_anak/{id}', [dataAnakController::class, 'destroy'])->name('admin-data-anak-delete');
    
// Route::get('/Beranda_Donasi_Admin', function () {
//     return view('Admin/beranda_donasi_admin');
// })->name('detail_barang');

Route::get('/Detail_Barang', function () {
    return view('Admin/detail_barang');
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/donasi-barang', [DonasiBarangController::class, 'index'])->name('admin.donasi.index');
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