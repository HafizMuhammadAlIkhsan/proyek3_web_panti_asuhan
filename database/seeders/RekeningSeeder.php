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
            'email_panti' => 'panti1@example.com',
            'no_rekening' => '1234567890',
            'nama_bank' => 'Bank A',
        ]);

        Rekening::create([
            'email_panti' => 'panti2@example.com',
            'no_rekening' => '0987654321',
            'nama_bank' => 'Bank B',
        ]);
    }
}
