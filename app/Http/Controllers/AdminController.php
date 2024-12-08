<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email_admin' => 'required|email|unique:admin,email_admin',
            'nama_pengurus' => 'required|string|max:50',
            'password_admin' => 'required|string|min:8',
            'jabatan' => 'required|string|max:50',
        ]);
    
        Admin::create([
            'email_admin' => $request->email_admin,
            'nama_pengurus' => $request->nama_pengurus,
            'password_admin' => bcrypt($request->password_admin),
            'jabatan' => $request->jabatan,
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
            'nama_pengurus' => 'required|string|max:50',
            'jabatan' => 'required|string|max:50',
            'password_admin' => 'nullable|string|min:8|max:60',
        ]);
    
        try {
            $admin = Admin::where('email_admin', $email)->firstOrFail();
    
            $admin->nama_pengurus = $request->nama_pengurus;
            $admin->jabatan = $request->jabatan;
    
            if ($request->password_admin) {
                $admin->password_admin = bcrypt($request->password_admin);
            }
    
            $admin->save();
    
            return redirect()->route('admin.list')->with('success', 'Data admin berhasil diperbarui.');
            
        } catch (\Exception $e) {
            return redirect()->route('admin.list')->with('error', 'Terjadi kesalahan. Data admin tidak dapat diperbarui.')->withInput();
        }
    }

    public function delete($email)
    {
        $admin = Admin::where('email_admin', $email)->first();
    
        if ($admin) {
            $admin->delete();
            return redirect()->back()->with('success', 'Data admin berhasil dihapus');
        }
    
        return redirect()->back()->with('error', 'Data admin tidak ditemukan');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $admins = Admin::where('nama_pengurus', 'like', '%' . $query . '%')
                       ->orWhere('email_admin', 'like', '%' . $query . '%')
                       ->paginate(5);
    
        return view('admin.list_admin', compact('admins'));
    }

    public function BerandaAdmin()
    {
        $admin = Auth::guard('admin')->user();

        $ProfileAdmin = [
            'email' => $admin->email_admin,
            'nama_pengurus'=>$admin->nama_pengurus,
            'jabatan'=>$admin->jabatan
        ];
        return view('Admin/beranda_admin', compact('ProfileAdmin'));
        
    }

    public function BerandaDonasi()
    {
        $admin = Auth::guard('admin')->user();

        $ProfileAdmin = [
            'email' => $admin->email_admin,
            'nama_pengurus'=>$admin->nama_pengurus,
            'jabatan'=>$admin->jabatan
        ];
        return view('Admin/beranda_donasi_admin', compact('ProfileAdmin'));
        
    }
    public function showDonasiBarang()
        {
            // Ambil data barang dengan paginasi (10 barang per halaman)
            $donasiBarang = DonasiBarang::paginate(10);

            // Kirim data ke view
            return view('Admin.detail_barang', compact('donasiBarang'));
        }
}