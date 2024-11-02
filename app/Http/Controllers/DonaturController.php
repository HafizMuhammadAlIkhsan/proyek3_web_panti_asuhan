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
        return view('Donatur/beranda_donatur');
    }
    
}