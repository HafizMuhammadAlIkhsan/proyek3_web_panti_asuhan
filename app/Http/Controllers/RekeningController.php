<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{

    public function AmbilListRekening()
    {
        $rekeningList = Rekening::orderBy('created_at')->paginate(10);
        return view('admin/list_rekening', compact('rekeningList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_nasabah' => 'required|max:30',
            'no_rekening' => 'required|max:30',
            'nama_bank' => 'required|max:30',
        ]);

        Rekening::create([
            'nama_nasabah' => $request->nama_nasabah,
            'no_rekening' => $request->no_rekening,
            'nama_bank' => $request->nama_bank,
            'status' => false,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Rekening berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $rekening = Rekening::find($id);
        if ($rekening) {
            $rekening->delete();
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $rekening = Rekening::findOrFail($id);
        $rekening->update(['status' => $request->status]);

        return response()->json(['message' => 'Status berhasil diupdate.']);
    }
}
