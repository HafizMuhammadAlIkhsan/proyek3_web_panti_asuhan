<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur; // Sesuaikan dengan model Donatur Anda

class RegisterController extends Controller
{
    // Menampilkan halaman register1
    public function showRegister1()
    {
        return view('Masyarakat_Umum.register1');
    }

    // Memproses register1 dan menyimpan data awal
    public function postRegister1(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email|unique:donatur,email',
            'password' => 'required|confirmed',
            'kontak' => 'required|max:12',
        ]);

        // Simpan data awal ke dalam session
        $request->session()->put('register1', $validated);

        // Pindah ke halaman register2
        return redirect()->route('register.step2');
    }

    // Menampilkan halaman register2
    public function showRegister2(Request $request)
    {
        // Cek apakah data register1 ada di session
        if (!$request->session()->has('register1')) {
            return redirect()->route('register.step1');
        }

        // Ambil data email dari session untuk ditampilkan
        $email = $request->session()->get('register1')['email'];
        return view('Masyarakat_Umum.register2', compact('email'));
    }

    // Memproses register2 dan menyimpan data tambahan
    public function postRegister2(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'nullable|max:50',
            'alamat' => 'nullable|max:255',
            'pekerjaan' => 'nullable|max:50',
            'tanggal' => 'nullable|integer',
            'bulan' => 'nullable|integer',
            'tahun' => 'nullable|integer',
            'gender' => 'nullable|boolean',
        ]);

        // Ambil data dari session
        $register1Data = $request->session()->get('register1');

        // Simpan data ke database
        Donatur::create([
            'email' => $register1Data['email'],
            'password' => $register1Data['password'],  // Pastikan password di-hash
            'kontak' => $register1Data['kontak'],
            'username' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'pekerjaan' => $request->input('pekerjaan'),
            'tgl_lahir_donatur' => $request->input('tahun') . '-' . $request->input('bulan') . '-' . $request->input('tanggal'),
            'gender' => $request->input('gender'),
        ]);

        // Hapus data dari session
        $request->session()->forget('register1');

        // Redirect ke halaman selesai atau dashboard
        return redirect()->route('beranda_donatur');
    }
}