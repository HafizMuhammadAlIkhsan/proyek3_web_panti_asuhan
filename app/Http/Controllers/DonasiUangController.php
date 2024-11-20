<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonasiUang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ProgramPanti;

class DonasiUangController extends Controller
{

    public function create()
    {
        $programs = ProgramPanti::all(); // Mengambil semua program
        return view('Masyarakat_Umum/masyarakat_umum_donasi_uang_tunai', compact('programs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_uang' => 'required|numeric',
            'cara_pembayaran' => 'required|string|max:30',
            'id_program' => 'required|exists:program_panti,id_program',
        ]);

        // Upload bukti transfer
        $buktiTransferPath = $request->file('bukti_transfer')->store('public/bukti_transfer');

        $email = Auth::check() ? Auth::user()->email : 'anonim@example.com';

        // Buat entri baru di donasi_uang
        DonasiUang::create([
            'email' => $email,
            'jumlah_uang' => $request->input('jumlah_uang'),
            'cara_pembayaran' => $request->input('cara_pembayaran'),
            'id_program' => $request->input('id_program'),
            'tanggal_donasi_uang' => now(),
            'bukti_transfer' => $buktiTransferPath,
            'status' => 'Diproses',
        ]);

        return redirect()->back()->with('success', 'Donasi berhasil dikirim untuk diverifikasi.');
    }


    public function store_donatur(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_uang' => 'required|numeric',
            'cara_pembayaran' => 'required|string|max:30',
        ]);

        // Upload the payment proof image
        $buktiTransferPath = $request->file('bukti_transfer')->store('public/bukti_transfer');

        Log::info('File path: ' . $buktiTransferPath);

        // Create a new donation entry
        DonasiUang::create([
            'email_admin' => 'admin@example.com', // Default email admin
            'email' => 'sulthan@example.com', // Menggunakan nilai tetap
            'jumlah_uang' => $request->input('jumlah_uang'),
            'cara_pembayaran' => $request->input('cara_pembayaran'),
            'tanggal_donasi_uang' => now(),
            'bukti_transfer' => $buktiTransferPath,
            'status' => 'Diproses',
        ]);

        return redirect()->back()->with('success', 'Donasi berhasil dikirim untuk diverifikasi.');
    }


    public function AmbilDataUang_Riwayat()
    {
        $donasiUang = DonasiUang::join('donatur', 'donasi_uang.email', '=', 'donatur.email')
            ->leftJoin('admin', 'donasi_uang.email_admin', '=', 'admin.email_admin')
            ->select('donasi_uang.*', 'donatur.username as donatur_nama', 'donatur.email as donatur_email')
            ->where('donatur.email', 'sulthan@example.com') //  Ganti jadi yang di session nya
            ->orderBy('donasi_uang.updated_at', 'asc') //  updated_at asc
            ->paginate(5);

        return view('Donatur/riwayat_donasi_uang', ['donasiUang' => $donasiUang]);
    }

    public function AmbilDataUang_Admin()
    {
        $donasiUang = DonasiUang::join('donatur', 'donasi_uang.email', '=', 'donatur.email')
            ->leftJoin('admin', 'donasi_uang.email_admin', '=', 'admin.email_admin')
            ->select('donasi_uang.*', 'donatur.username as donatur_nama', 'donatur.email as donatur_email')
            ->orderBy('donasi_uang.updated_at', 'asc') //  updated_at asc
            ->paginate(5);

        return view('Admin/list_uang', ['donasiUang' => $donasiUang]);
    }

    // DonasiUangController.php
    public function UpdateDataUang(Request $request, $id)
    {
        $donasiUang = DonasiUang::findOrFail($id);

        // Validasi status
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        // Update status
        $donasiUang->status = $request->input('status');
        $donasiUang->save();

        return response()->json(['message' => 'Status berhasil diperbarui']);
    }

    public function HapusDataUang($id)
    {
        // Cari data donasi Uang berdasarkan ID
        $donasi = DonasiUang::find($id);

        if ($donasi) {
            $donasi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data Uang berhasil dihapus.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Uang tidak ditemukan.'
            ], 404);
        }
    }
}
