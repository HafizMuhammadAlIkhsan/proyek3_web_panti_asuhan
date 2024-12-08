<?php

namespace App\Http\Controllers;

use App\Models\DonasiBarang;
use Illuminate\Http\Request;

class DonasiBarangController extends Controller
{
    public function index()
    {
        // Mengambil data donasi barang dan relasi donatur, lalu melakukan paginasi
        $donasiBarang = DonasiBarang::with('donatur')->paginate(10);

        // Mengirimkan data ke view
        return view('Admin.detail_barang', compact('donasiBarang'));
    }

    public function detail($id)
    {
        // Mengambil detail donasi barang berdasarkan ID
        $donasi = DonasiBarang::with('donatur')->findOrFail($id);

        // Mengembalikan detail donasi dalam format JSON
        return response()->json([
            'donatur' => $donasi->donatur->nama_asli,
            'tanggal' => $donasi->tanggal_verifikasi_barang,
            'nama_barang' => $donasi->nama_barang,
            'jumlah' => $donasi->jumlah_barang,
            'status' => $donasi->status,
            'bukti_foto' => asset('storage/' . $donasi->bukti_foto),
        ]);
    }

    public function update_status($id, Request $request)
    {
        // Menyetujui donasi dan memperbarui status
        $donasi = DonasiBarang::findOrFail($id);
        $admin = auth('admin')->user()?->email_admin;
        $donasi->update(['status' => $request->status, 'email_admin' => $admin]);
        return response()->json(['message' => 'Donasi berhasi diubah']);
    }

    public function destroy($id)
    {
        // Menghapus donasi dan foto bukti jika ada
        $donasi = DonasiBarang::findOrFail($id);
        if ($donasi->bukti_foto) {
            \Storage::disk('public')->delete($donasi->bukti_foto);
        }
        $donasi->delete();

        return response()->json(['message' => 'Donasi berhasil dihapus']);
    }

    // takeout
    public function bulkStatus(Request $request)
    {
        // Menyetujui banyak donasi berdasarkan ID
        $ids = $request->ids;
        $status = $request->status;
        DonasiBarang::whereIn('id_donasi_barang', $ids)
            ->update(['status' => $status]);

        return response()->json(['message' => 'Donasi berhasil diapprove']);
    }
}
