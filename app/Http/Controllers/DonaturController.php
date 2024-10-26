<?php
// app/Http/Controllers/DonaturController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonaturController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Ambil data donatur berdasarkan email (jika email adalah primary key)
        $donatur = Donatur::findOrFail($user->email);
        dd($user, $donatur);
        return view('welcome', ['donatur' => $donatur]);
        // return view('donatur.beranda');
    }
    
}