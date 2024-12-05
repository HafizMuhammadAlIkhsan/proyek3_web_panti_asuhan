<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AkunAdminController extends Controller
{

    

    
    // public function show($email_admin)
    // {
    //     $admin = Admin::findOrFail($email_admin);
    //     return response()->json($admin);
    // }

    // public function UpdateDataAdmin(Request $request, $email_admin)
    // {
    //     $admin = Admin::findOrFail($email_admin);

    //     if (!$admin) {
    //         return redirect()->back()->with('error', 'Admin tidak ditemukan.');
    //     }

    //     $request->validate([
    //         'nama_pengurus' => 'required|string|max:50',
    //         'password_admin' => 'required|string|min:8|confirmed',
    //         'jabatan' => 'required|string|max:50',
    //     ]);

    //     // // Cek apakah email baru sudah digunakan oleh admin lain
    //     // if ($request->email_admin != $email_admin) {
    //     //     $existingAdmin = Admin::where('email_admin', $request->email_admin)->first();
        
    //     //     if ($existingAdmin) {
    //     //         return redirect()->back()->with('error', 'Email sudah terdaftar.');
    //     //     }
    //     // }
   
    //     $admin->nama_pengurus = $request->nama_pengurus;
    //     $admin->jabatan = $request->jabatan;
    //     $admin->password_admin = bcrypt($request->password_admin);

    //     $admin->save();

    //     return redirect()->back()->with('success', 'Data admin berhasil diperbarui.');
    // }

    // public function HapusDataAdmin($email_admin)
    // {
    //     $admin = Admin::find($email_admin);

    //     if ($admin) {
    //         $admin->delete();

    //         return redirect()->route('admin.list')->with('success', 'Data admin berhasil dihapus.');
    //     } else {
    //         return redirect()->route('admin.list')->with('error', 'Data admin tidak ditemukan.');
    //     }
    // }
}
