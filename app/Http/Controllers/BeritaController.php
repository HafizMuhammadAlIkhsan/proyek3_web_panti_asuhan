<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BeritaController extends Controller
{
    // app/Http/Controllers/BeritaController.php
    public function store(Request $request)
    {
        $request->validate([
            'nama_berita' => 'required|max:50',
            'isi_berita' => 'required',
            'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar_berita')) {
            $imagePath = $request->file('gambar_berita')->store('images', 'public');
        } else {
            $imagePath = null;  
        }
        

        DB::table('berita')->insert([
            'email_admin' => 'admin@example.com',
            'nama_berita' => $request->nama_berita,
            'isi_berita' => $request->isi_berita,
            'tgl_upload' => now(),
            'gambar_berita' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }
}
