<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Rekening;

class RekeningSeeder extends Seeder
{
    public function run()
    {
        Rekening::create([
            'nama_nasabah' => 'Leqo',
            'no_rekening' => '1234567890',
            'nama_bank' => 'Bank A',
            'status' => false,
        ]);

        Rekening::create([
            'nama_nasabah' => 'Dudung',
            'no_rekening' => '0987654321',
            'nama_bank' => 'Bank B',
            'status' => false,
        ]);
    }
}
