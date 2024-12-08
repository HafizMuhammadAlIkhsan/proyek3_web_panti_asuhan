<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\DonasiBarang;
use App\Models\DonasiJasa;
use App\Models\DonasiUang;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email_admin' => 'required|email|unique:admin,email_admin',
            'nama_pengurus' => 'required|string|regex:/^[A-Za-z\s]+$/|max:50',
            'password_admin' => 'required|confirmed|string|min:8',
            'jabatan' => 'required|string|max:50',
        ], [
            'email_admin.required' => 'Email wajib diisi.',
            'email_admin.email' => 'Format email tidak valid.',
            'email_admin.unique' => 'Email sudah terdaftar.',
            'nama_pengurus.required' => 'Nama pengurus wajib diisi.',
            'nama_pengurus.regex' => 'Nama pengurus hanya boleh mengandung huruf dan spasi.',
            'nama_pengurus.max' => 'Nama pengurus maksimal 50 karakter.',
            'password_admin.required' => 'Password wajib diisi.',
            'password_admin.min' => 'Password minimal terdiri dari 8 karakter.',
            'password_admin.confirmed' => 'Password dan konfirmasi password tidak cocok.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'jabatan.max' => 'Jabatan maksimal 50 karakter.',
        ]);
    
        Admin::create([
            'email_admin' => $request->email_admin,
            'nama_pengurus' => $request->nama_pengurus,
            'password_admin' => bcrypt($request->password_admin),
            'jabatan' => $request->jabatan,
            'status_akun' => 'Aktif',
        ]);
    
        return redirect()->back()->with('success', 'Data admin berhasil ditambahkan.');
    }

    public function listAdmins()
    {
        $admins = Admin::orderBy('nama_pengurus')->paginate(5);

        return view('Admin/list_admin', compact('admins'));
    }

    public function update(Request $request, $email)
    {
        $request->validate([
            'nama_pengurus' => 'required|string|regex:/^[A-Za-z\s]+$/|max:50',
            'jabatan' => 'required|string|max:50',
            'password_admin' => 'nullable|string|min:8|max:60',
            'status_akun' => 'required|string|max:11',
        ], [
            'nama_pengurus.required' => 'Nama pengurus wajib diisi.',
            'nama_pengurus.regex' => 'Nama pengurus hanya boleh mengandung huruf dan spasi.',
            'nama_pengurus.max' => 'Nama pengurus maksimal 50 karakter.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'jabatan.max' => 'Jabatan maksimal 50 karakter.',
            'password_admin.min' => 'Password minimal terdiri dari 8 karakter.',
            'password_admin.max' => 'Password maksimal 60 karakter.',
            'status_akun.required' => 'Status akun wajib diisi.',
            'status_akun.max' => 'Status akun maksimal 11 karakter.',
        ]);
        
        $admin = Admin::where('email_admin', $email)->first();

        if (!$admin) {
            return redirect()->back()->withErrors('Admin tidak ditemukan.');
        }

        $admin->nama_pengurus = $request->nama_pengurus;
        $admin->jabatan = $request->jabatan;
        $admin->status_akun = $request->status_akun;

        if ($request->password_admin) {
            $admin->password_admin = bcrypt($request->password_admin);
        }

        if ($admin->save()) {
            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect()->back()->withErrors('Gagal memperbarui profil.');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $admins = Admin::where('nama_pengurus', 'like', '%' . $query . '%')
                       ->orWhere('email_admin', 'like', '%' . $query . '%')
                       ->paginate(5);
    
        return view('admin.list_admin', compact('admins'));
    }

    public function berandaAdmin()
    {
        $admin = Auth::guard('admin')->user();

        $ProfileAdmin = [
            'email' => $admin->email_admin,
            'nama_pengurus'=>$admin->nama_pengurus,
            'jabatan'=>$admin->jabatan
        ];

        $totalDonasiBarang = DonasiBarang::count();
        $totalDonasiJasa = DonasiJasa::count();
        $totalDonasiUang = DonasiUang::count();
        $totalDonasi = $totalDonasiBarang + $totalDonasiJasa + $totalDonasiUang;

        $donasiDiterimaBarang = DonasiBarang::where('status', 'Diterima')->count();
        $donasiDiterimaJasa = DonasiJasa::where('status', 'Diterima')->count();
        $donasiDiterimaUang = DonasiUang::where('status', 'Diterima')->count();
        $donasiDiterima = $donasiDiterimaBarang + $donasiDiterimaJasa + $donasiDiterimaUang;

        $donasiPendingBarang = DonasiBarang::where('status', '!=', 'Diterima')->count();
        $donasiPendingJasa = DonasiJasa::where('status', '!=', 'Diterima')->count();
        $donasiPendingUang = DonasiUang::where('status', '!=', 'Diterima')->count();
        $donasiPending = $donasiPendingBarang + $donasiPendingJasa + $donasiPendingUang;

        return view('Admin.beranda_admin', compact('ProfileAdmin', 'totalDonasi', 'donasiDiterima', 'donasiPending')); 
    }

    public function berandaDonasi()
    {
        $admin = Auth::guard('admin')->user();

        $ProfileAdmin = [
            'email' => $admin->email_admin,
            'nama_pengurus'=>$admin->nama_pengurus,
            'jabatan'=>$admin->jabatan
        ];
        return view('Admin/beranda_donasi_admin', compact('ProfileAdmin'));
        
    }
}
