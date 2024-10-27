<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonasiJasa;

class DonasiJasaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|exists:donatur,email', // Memastikan email donatur ada di tabel donatur
            'nama_jasa' => 'required|string|max:50',
            'deskripsi_jasa' => 'required|string|max:500',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'nullable|date|after_or_equal:jadwal_mulai',
        ]);

        // Menyimpan data ke database
        DonasiJasa::create([
            'email_admin' => 'admin@example.com', // Default email admin nanti kalau Done semua ganti jadi dinamis
            'email' => $request->email,
            'nama_jasa' => $request->nama_jasa,
            'deskripsi_jasa' => $request->deskripsi_jasa,
            'jadwal_mulai' => $request->jadwal_mulai,
            'jadwal_selesai' => $request->jadwal_selesai,
        ]);

        // Redirect setelah sukses
        return redirect()->back()->with('success', 'Data donasi jasa berhasil ditambahkan.');
    }

    // Mengambil Data Dari database struktur nya seperti sql query
    public function AmbilData()
    {
    $donasiJasa = DonasiJasa::join('donatur', 'donasi_jasa.email', '=', 'donatur.email')
                            ->leftJoin('admin', 'donasi_jasa.email_admin', '=', 'admin.email_admin')
                            ->select('donasi_jasa.*', 'donatur.username as donatur_nama', 'donatur.email as donatur_email')
                            ->paginate(10);

        return view('Admin/list_jasa', ['donasiJasa' => $donasiJasa]);
    }

}
