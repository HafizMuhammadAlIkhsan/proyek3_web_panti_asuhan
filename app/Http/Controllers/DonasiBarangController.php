<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DonasiBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DonasiBarangController extends Controller
{
    public function index()
    {
        $donasi_barang = DonasiBarang::with('donatur')
            ->orderBy('tanggal_verifikasi_barang', 'desc')
            ->paginate(10);

        return view('admin.donasi_barang', compact('donasi_barang'));
    }

    public function detail($id)
    {
        $donasi = DonasiBarang::with('donatur')->findOrFail($id);
    
        return response()->json([
            'donatur' => $donasi->donatur->nama_asli,
            'tanggal' => $donasi->tanggal_verifikasi_barang,
            'nama_barang' => $donasi->nama_barang,
            'jumlah' => $donasi->jumlah_barang,
            'bukti_foto' => asset('storage/' . $donasi->bukti_foto),
        ]);
    }

    public function approve($id)
    {
        $donasi = DonasiBarang::findOrFail($id);
        $donasi->update(['status' => 'Menunggu_pengiriman']);
        return response()->json(['message' => 'Donasi berhasil diapprove']);
    }

    public function reject($id)
    {
        $donasi = DonasiBarang::findOrFail($id);
        $donasi->update(['status' => 'Dibatalkan']);
        return response()->json(['message' => 'Donasi berhasil dibatalkan']);
    }

    public function destroy($id)
    {
        $donasi = DonasiBarang::findOrFail($id);
        if($donasi->bukti_foto) {
            Storage::disk('public')->delete($donasi->bukti_foto);
        }
        $donasi->delete();
        return response()->json(['message' => 'Donasi berhasil dihapus']);
    }

    public function bulkApprove(Request $request)
    {
        $ids = $request->ids;
        DonasiBarang::whereIn('id_donasi_barang', $ids)
            ->update(['status' => 'Menunggu_pengiriman']);
        return response()->json(['message' => 'Donasi berhasil diapprove']);
    }
}