<?php
// app/Http/Controllers/DonasiController.php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DonasiBarang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DonasiController extends Controller
{
    public function index()
    {
        return view('donasi.index');
    }

    public function jasaIndex()
    {
        return view('donasi.jasa');
    }

    public function donasi_barang(Request $r)
    {
        // Validasi jumlah barang dan tanggal pengiriman
        $validatedData = $r->validate([
            'jumlah_barang' => 'required|integer|min:1', // Jumlah barang harus lebih dari 0
            'tanggal_verifikasi_barang' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(), // Tanggal harus setelah atau sama dengan hari ini
            'bukti_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menyimpan file bukti foto
        $path = $r->file('bukti_foto')->storeAs('images', $r->file('bukti_foto')->getClientOriginalName(), 'public');
        
        // Menambahkan data tambahan
        $data = $r->all();
        $data['email'] = auth()->user()?->email ?? 'aangkasarayaa@gmail.com'; // Menambahkan email
        $data['email_admin'] = Admin::get()->first()->email_admin; // Mendapatkan email admin pertama
        $data['bukti_foto'] = $path; // Menyimpan path file bukti foto

        // Simpan data donasi barang ke database
        DonasiBarang::create($data);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Donasi barang berhasil terkirim!');
    }
}