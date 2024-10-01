<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonasiJasa;

class DonasiJasaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'email_pengurus' => 'required|email',
            'nama_jasa' => 'required|string',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after_or_equal:jadwal_mulai',
        ]);

        // Menyimpan data ke database
        DonasiJasa::create([
            'email_pengurus' => $request->input('email_pengurus', 'pengurus@example.com'),  // Default value
            'nama_jasa' => $request->input('nama_jasa'),
            'jadwal_mulai' => $request->input('jadwal_mulai'),
            'jadwal_selesai' => $request->input('jadwal_selesai'),
        ]);

        // Redirect setelah berhasil menyimpan
        return redirect()->back()->with('success', 'Donasi jasa berhasil disimpan!');
    }
}



