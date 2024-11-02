<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;


class HalamanDonasiController extends Controller
{
    public function index()
    {
        return view('Donatur/beranda_donasi');
    }
}
