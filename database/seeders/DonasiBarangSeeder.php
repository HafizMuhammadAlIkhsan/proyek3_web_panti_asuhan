<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonasiBarangSeeder extends Seeder
{
    public function run()
    {
        DB::table('donasi_barang')->insert([
            'id_donasi_barang' => 1,
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_barang' => 'Buku Pelajaran',
            'jumlah_barang' => 10,
            'tanggal_verifikasi_barang' => now(),
            'bukti_pengiriman' => 'bukti.jpg'
        ]);
    }
}

