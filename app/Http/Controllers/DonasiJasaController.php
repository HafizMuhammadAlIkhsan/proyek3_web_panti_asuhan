<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonasiJasa;
use Illuminate\Support\Facades\Auth;

class DonasiJasaController extends Controller
{
    public function store(Request $request)
    {

        $admin = Auth::guard('admin')->user();
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
            'email_admin' => $admin->email_admin, 
            'email' => $request->email,
            'nama_jasa' => $request->nama_jasa,
            'deskripsi_jasa' => $request->deskripsi_jasa,
            'jadwal_mulai' => $request->jadwal_mulai,
            'jadwal_selesai' => $request->jadwal_selesai,
            'created_at' => now(),
        ]);

        // Redirect setelah sukses
        return redirect()->back()->with('success', 'Data donasi jasa berhasil ditambahkan.');
    }

    // Mengambil Data Dari database struktur nya seperti sql query
    public function AmbilDataJasa_Admin()
    {
        $donasiJasa = DonasiJasa::join('donatur', 'donasi_jasa.email', '=', 'donatur.email')
            ->leftJoin('admin', 'donasi_jasa.email_admin', '=', 'admin.email_admin')
            ->select('donasi_jasa.*', 'donatur.username as donatur_nama', 'donatur.email as donatur_email')
            ->orderBy('donasi_jasa.updated_at', 'asc') //  updated_at asc
            ->paginate(10);
           

        return view('Admin/list_jasa', ['donasiJasa' => $donasiJasa]);
    }

    public function AmbilDataJasa_Riwayat()//Kirim data email nya disini euy
    {
        $donasiJasa = DonasiJasa::join('donatur', 'donasi_jasa.email', '=', 'donatur.email')
            ->leftJoin('admin', 'donasi_jasa.email_admin', '=', 'admin.email_admin')
            ->select('donasi_jasa.*', 'donatur.username as donatur_nama', 'donatur.email as donatur_email')
            ->where('donatur.email','donatur@example.com')// Ganti ini jadi email yang di session nya pas sudah ada place holder nya 
            ->orderBy('donasi_jasa.updated_at', 'asc') //  updated_at asc
            ->paginate(5);

        return view('Donatur/riwayat_donasi_jasa', ['donasiJasa' => $donasiJasa]);
    }

    public function show($id)
    {
        $jasa = DonasiJasa::findOrFail($id);
        return response()->json($jasa);
    }

    public function UpdateDataJasa(Request $request, $id)
    {
        $jasa = DonasiJasa::findOrFail($id);
        // replace jasa dengan yang di request
        $jasa->deskripsi_jasa = $request->deskripsi_jasa;
        $jasa->status = $request->status;
        $jasa->jadwal_mulai = $request->jadwal_mulai;
        $jasa->jadwal_selesai = $request->jadwal_selesai;

        $jasa->save();

        return response()->json(['message' => 'Data berhasil diperbarui.']);
    }

    public function HapusDataJasa($id)
    {
        // Cari data donasi jasa berdasarkan ID
        $jasa = DonasiJasa::find($id);

        if ($jasa) {
            $jasa->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data jasa berhasil dihapus.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data jasa tidak ditemukan.'
            ], 404);
        }
    }
}
