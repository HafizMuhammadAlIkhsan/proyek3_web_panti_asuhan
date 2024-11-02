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
        $donasi->update(['status' => 'Diterima']);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Donasi berhasil diapprove'
        ]);
    }

    public function reject($id)
    {
        $donasi = DonasiBarang::findOrFail($id);
        $donasi->update(['status' => 'Dibatalkan']);
        
        return response()->json([
            'status' => 'success', 
            'message' => 'Donasi berhasil direject'
        ]);
    }

    public function approveSelected(Request $request)
    {
        $ids = $request->input('ids', []);
        
        DonasiBarang::whereIn('id_donasi_barang', $ids)
            ->update(['status' => 'Diterima']);

        return response()->json([
            'status' => 'success',
            'message' => 'Donasi terpilih berhasil diapprove'
        ]);
    }

    public function update(Request $request, $id)
    {
        $donasi = DonasiBarang::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:Diproses,Diterima,Dibatalkan',
            'nama_barang' => 'required|string|max:50',
            'jumlah_barang' => 'required|integer|min:1',
            'tanggal_verifikasi_barang' => 'required|date',
        ]);

        $donasi->update($validated);

        return redirect()->route('admin.donasi.index')
            ->with('success', 'Data donasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $donasi = DonasiBarang::findOrFail($id);
        
        if($donasi->bukti_foto) {
            Storage::disk('public')->delete($donasi->bukti_foto);
        }
        
        $donasi->delete();

        return redirect()->route('admin.donasi.index')
            ->with('success', 'Data donasi berhasil dihapus');
    }
}