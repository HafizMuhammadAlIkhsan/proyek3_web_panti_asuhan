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
            'nomer_cp' => 81214431135,
        ]);
    }
}
