<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonasiJasaSeeder extends Seeder
{
    public function run()
    {
        DB::table('donasi_jasa')->insert([
            'id_donasi_jasa' => 1,
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar Matematika',
            'jadwal_mulai' => now(),
            'jadwal_selesai' => null
        ]);
    }
}


