<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonasiJasaSeeder extends Seeder
{
    public function run()
    {
        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar Matematika',
            'deskripsi_jasa' => 'Mengajar Matematika tingkat SMA Matriks',
            'jadwal_mulai' => now(),
            'jadwal_selesai' => null
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar Biologi',
            'deskripsi_jasa' => 'Mengajar Biologi tingkat SMA',
            'jadwal_mulai' => now(),
            'jadwal_selesai' => null
        ]);
    }
}


