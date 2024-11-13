<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', true)
            ->orderBy('tgl_upload', 'desc')
            ->paginate(3);
        return view('Masyarakat_Umum/Katalog_berita', compact('berita'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama_berita' => 'required|string|max:50',
            'isi_berita' => 'required',
            'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // upload gambar
        $gambarBerita = null;
        if ($request->hasFile('gambar_berita')) {
            $gambarBerita = $request->file('gambar_berita')->store('berita_images', 'public');
        }

        // Insert data ke tabel berita
        Berita::create([
            'email_admin' => 'admin@example.com', // placholder
            'nama_berita' => $request->nama_berita,
            'isi_berita' => $request->isi_berita,
            'tgl_upload' => now(),
            'gambar_berita' => $gambarBerita,
        ]);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
    }

    public function AmbilDataBerita_Admin()
    {
        $berita = Berita::with('admin') // Ambil relasi admin untuk mendapatkan nama_pengurus
            ->orderBy('tgl_upload', 'asc')
            ->paginate(5);

        return view('Admin/list_berita', ['berita' => $berita]);
    }
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_berita' => 'required|string|max:50',
        'isi_berita' => 'required',
        'status' => 'required|boolean',
    ]);

    $berita = Berita::findOrFail($id);

    // Cek apakah status berubah
    $statusChanged = $berita->status !== (bool)$request->status;

    // Update berita
    $berita->update([
        'nama_berita' => $request->nama_berita,
        'isi_berita' => $request->isi_berita,
        'status' => $request->status,
        'tgl_upload' => $statusChanged ? now() : $berita->tgl_upload,
    ]);

    return redirect()->back()->with('success', 'Berita berhasil diperbarui.');
}


    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }
}
