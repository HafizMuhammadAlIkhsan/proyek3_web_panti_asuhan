<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Masyarakat;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Masyarakat::create([
            'email' => 'Johndoe1@example.com',
            'nama_asli' => 'John Doe',
        ]);

        Masyarakat::create([
            'email' => 'masyarakat2@example.com',
            'nama_asli' => 'Jannah',
        ]);
    }
}
