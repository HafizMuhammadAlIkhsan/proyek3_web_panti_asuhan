<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonasiUang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DonasiUangController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_uang' => 'required|numeric',
            'cara_pembayaran' => 'required|string|max:30',
        ]);

        // Upload the payment proof image
        $buktiTransferPath = $request->file('bukti_transfer')->store('public/bukti_transfer');


        Log::info('File path: ' . $buktiTransferPath);

        $email = Auth::check() ? Auth::user()->email : 'sulthan@example.com';

        // Create a new donation entry
        DonasiUang::create([
            'email' => $email,
            'jumlah_uang' => $request->input('jumlah_uang'),
            'cara_pembayaran' => $request->input('cara_pembayaran'),
            'tanggal_donasi_uang' => now(),
            'bukti_transfer' => $buktiTransferPath,
            'status' => 'Diproses',
        ]);
        

        return redirect()->back()->with('success', 'Donasi berhasil dikirim untuk diverifikasi.');
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
