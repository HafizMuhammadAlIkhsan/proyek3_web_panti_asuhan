<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonaturSeeder extends Seeder
{
    public function run()
    {
        DB::table('donatur')->insert([
            'email' => 'donatur@example.com',
            'username' => 'donatur123',
            'nama_asli' => 'Donatur1',
            'password' => 'donasi123',
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '123456789012',
            'pekerjaan' => 'Guru',
            'gender' => true,
            'kota' => 'Jakarta'
        ]);
    }
}

