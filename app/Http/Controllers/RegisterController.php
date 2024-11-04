<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;

class RegisterController extends Controller
{
    public function showRegister1()
    {
        return view('Masyarakat_Umum.register1');
    }

    public function postRegister1(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:donatur,email',
            'password' => 'required|confirmed',
            'kontak' => 'required|max:12',
        ]);

        $request->session()->put('register1', $validated);

        return redirect()->route('register.step2');
    }

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

    public function postRegister2(Request $request)
    {
        // Validasi input
        // $validated = $request->validate([
        //     'username' => 'nullable|max:50',
        //     'alamat' => 'nullable|max:255',
        //     'pekerjaan' => 'nullable|max:50',
        //     'tanggal' => 'nullable|integer',
        //     'bulan' => 'nullable|integer',
        //     'tahun' => 'nullable|integer',
        //     'gender' => 'nullable|boolean',
        // ]);

        // Ambil data dari session
        $register1Data = $request->session()->get('register1');

        // Simpan data ke database
        Donatur::create([
            'email' => $register1Data['email'],
            'password' => $register1Data['password'],
            'kontak' => $register1Data['kontak'],
            'username' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'pekerjaan' => $request->input('pekerjaan'),
            'tgl_lahir_donatur' => $request->input('tahun') . '-' . $request->input('bulan') . '-' . $request->input('tanggal'),
            'gender' => $request->input('gender'),
        ]);

        $request->session()->forget('register1');

        return redirect()->route('beranda_donatur');
    }
}