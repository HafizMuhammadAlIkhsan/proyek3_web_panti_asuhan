<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PantiAsuhan;

class PantiAsuhanController extends Controller
{
    public function edit()
    {
        $panti = PantiAsuhan::where('id_panti', 1)->firstOrFail();

        return view('Admin/edit_datapanti', compact('panti'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'email_panti' => 'required|email|max:50',
            'nama_panti' => 'required|string|max:50',
            'lokasi_panti' => 'required|string|max:255',
            'nomer_cp' => 'nullable|numeric|digits_between:8,15',
        ]);

        // Cari data panti asuhan berdasarkan ID
        $panti = PantiAsuhan::where('id_panti', 1)->firstOrFail();

        // Update data
        $panti->update([
            'email_panti' => $request->email_panti,
            'nama_panti' => $request->nama_panti,
            'lokasi_panti' => $request->lokasi_panti,
            'nomer_cp' => $request->nomer_cp,
        ]);

        // Redirect dengan pesan sukses
        return redirect()
            ->route('panti.edit')
            ->with('success', 'Informasi panti berhasil diperbarui.');
    }
}
