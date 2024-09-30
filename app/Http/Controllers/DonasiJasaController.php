<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonasiJasa;

class DonasiJasaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'email' => 'required|email',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',  
        ]);

        // Simpan data ke dalam tabel `donasi_jasa`
        $donasiJasa = DonasiJasa::create([
            'EMAIL_PENGURUS' => $validated['email'],
            'NAMA_JASA' => $validated['description'],
            'JADWAL_MULAI' => $validated['start_date'],
            'JADWAL_SELESAI' => $validated['end_date'],
        ]);

        // id akan otomatis terisi oleh Laravel (auto-increment)
        // Mengembalikan response atau redirect ke halaman lain
        return redirect()->back()->with('success', 'Donasi Jasa berhasil ditambahkan dengan ID: ' . $donasiJasa->id);
    }
}


