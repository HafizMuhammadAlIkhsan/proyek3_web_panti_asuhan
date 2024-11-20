<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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
}
