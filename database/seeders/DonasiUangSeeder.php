<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonasiUangSeeder extends Seeder
{
    public function run()
    {
        DB::table('donasi_uang')->insert([
            'id_donasi_uang' => 1,
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'jumlah_uang' => 500000,
            'cara_pembayaran' => 'Transfer Bank',
            'tanggal_donasi_uang' => now(),
            'bukti_transfer' => 'transfer.jpg'
        ]);
    }
}



