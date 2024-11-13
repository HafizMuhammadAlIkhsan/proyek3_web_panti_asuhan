<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\PantiAsuhan;

class PantiAsuhanSeeder extends Seeder
{
    public function run()
    {
        PantiAsuhan::create([
            'email_panti' => 'panti1@example.com',
            'nama_panti' => 'Panti Asuhan A',
            'lokasi_panti' => 'Jalan Mawar No. 1',
            'nomer_cp' => 123456789,
        ]);

        PantiAsuhan::create([
            'email_panti' => 'panti2@example.com',
            'nama_panti' => 'Panti Asuhan B',
            'lokasi_panti' => 'Jalan Melati No. 2',
            'nomer_cp' => 987654321,
        ]);
    }
}