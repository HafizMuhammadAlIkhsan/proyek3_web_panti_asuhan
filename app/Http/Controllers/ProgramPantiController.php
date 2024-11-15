<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramPanti;
use Illuminate\Support\Facades\Storage;

class ProgramPantiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_program' => 'required|string|max:50|unique:program_panti,nama_program',
            'gambar_program' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_program' => 'required|string',
            'dana_program' => 'required|integer|min:0',
        ]);

        // Upload gambar
        $imagePath = $request->file('gambar_program')->store('program_panti_images', 'public');

        // Simpan data ke database
        ProgramPanti::create([
            'nama_program' => $validatedData['nama_program'],
            'email_admin' => 'admin@example.com', // Default value
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

    // Update a program
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Find the program by ID
        $program = ProgramPanti::findOrFail($id);

        // Update the program fields
        $program->nama_program = $request->input('nama_program');
        $program->status = $request->input('status');

        // Save the changes
        $program->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Program berhasil diperbarui.');
    }

    // Delete a program
    public function destroy($id)
    {
        // Find the program by ID
        $program = ProgramPanti::findOrFail($id);

        // Delete the program
        $program->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Program berhasil dihapus.');
    }
}
