<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DonasiBarang;
use Illuminate\Http\Request;

class DonasiBarangController extends Controller
{
   public function index()
   {
       $donasi_barang = DonasiBarang::with('user')
           ->orderBy('created_at', 'desc')
           ->paginate(10);

       return view('admin.donasi_barang', compact('donasi_barang'));
   }

   public function detail($id)
   {
       $donasi = DonasiBarang::with('user')->findOrFail($id);
       
       return response()->json([
           'donatur' => $donasi->user->name,
           'tanggal' => $donasi->tanggal,
           'nama_barang' => $donasi->nama_barang,
           'jumlah' => $donasi->jumlah,
           'bukti_foto' => asset('storage/' . $donasi->bukti_foto),
       ]);
   }

   public function approve($id)
   {
       $donasi = DonasiBarang::findOrFail($id);
       $donasi->update(['status' => 'Confirmed']);
       
       return response()->json([
           'status' => 'success',
           'message' => 'Donasi berhasil diapprove'
       ]);
   }

   public function reject($id)
   {
       $donasi = DonasiBarang::findOrFail($id);
       $donasi->update(['status' => 'Rejected']);
       
       return response()->json([
           'status' => 'success', 
           'message' => 'Donasi berhasil direject'
       ]);
   }

   public function approveSelected(Request $request)
   {
       $ids = $request->input('ids', []);
       
       DonasiBarang::whereIn('id', $ids)
           ->update(['status' => 'Confirmed']);

       return response()->json([
           'status' => 'success',
           'message' => 'Donasi terpilih berhasil diapprove'
       ]);
   }

   public function show($id)
   {
       $donasi = DonasiBarang::with('user')->findOrFail($id);
       return view('admin.donasi.detail', compact('donasi'));
   }

   public function edit($id)
   {
       $donasi = DonasiBarang::findOrFail($id);
       return view('admin.donasi.edit', compact('donasi'));
   }

   public function update(Request $request, $id)
   {
       $donasi = DonasiBarang::findOrFail($id);
       
       $validated = $request->validate([
           'status' => 'required|in:Diproses,Confirmed,Rejected',
           'nama_barang' => 'required|string|max:255',
           'jumlah' => 'required|integer|min:1',
           'tanggal' => 'required|date',
       ]);

       $donasi->update($validated);

       return redirect()->route('admin.donasi.index')
           ->with('success', 'Data donasi berhasil diperbarui');
   }

   public function destroy($id)
   {
       $donasi = DonasiBarang::findOrFail($id);
       
       // Hapus file bukti foto jika ada
       if($donasi->bukti_foto) {
           Storage::disk('public')->delete($donasi->bukti_foto);
       }
       
       $donasi->delete();

       return redirect()->route('admin.donasi.index')
           ->with('success', 'Data donasi berhasil dihapus');
   }
}