<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramPanti;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProgramPantiController extends Controller
{

    public function index()
    {
        $programpanti = ProgramPanti::where('status', true)
            ->orderBy('tgl_upload', 'desc')
            ->paginate(3);
        return view('Masyarakat_Umum/Katalog_Program', compact('programpanti'));
    }

    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Validasi data
        $validatedData = $request->validate([
            'nama_program' => 'required|string|max:50|unique:program_panti,nama_program',
            'gambar_program' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_program' => 'required|string',
            'dana_program' => 'required|integer|min:0',
        ]);

        $imagePath = $request->file('gambar_program')->store('program_panti_images', 'public');

        // Simpan data ke database
        ProgramPanti::create([
            'nama_program' => $validatedData['nama_program'],
            'email_admin' => $admin->email_admin,
            'deskripsi_program' => $validatedData['deskripsi_program'],
            'dana_program' => $validatedData['dana_program'],
            'tgl_upload' => now(),
            'status' => false,
            'gambar_program' => $imagePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Program berhasil ditambahkan!');
    }

    public function AmbilDataProgram_Admin()
    {
        $programpanti = ProgramPanti::with('admin') // Ambil relasi admin untuk mendapatkan nama_pengurus
            ->orderBy('tgl_upload', 'asc')
            ->paginate(5);

        return view('Admin/list_program', ['programpanti' => $programpanti]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id_program' => 'required|exists:program_panti,id_program',
            'deskripsi_program' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $program = ProgramPanti::find($validated['id_program']); // Cari berdasarkan primary key
        $program->deskripsi_program = $validated['deskripsi_program'];
        $program->status = $validated['status'];
        $program->tgl_upload = now()->toDateString();
        $program->save();

        return redirect()->route('list-program')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id_program' => 'required|exists:program_panti,id_program',
        ]);

        ProgramPanti::destroy($validated['id_program']); // Hapus berdasarkan primary key

        return redirect()->route('list-program')->with('success', 'Program berhasil dihapus.');
    }


}
