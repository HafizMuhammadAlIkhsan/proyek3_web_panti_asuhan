<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            DonaturSeeder::class,
            AnakAsuhSeeder::class,
            BeritaSeeder::class,
            DonasiBarangSeeder::class,
            DonasiJasaSeeder::class,
            DonasiUangSeeder::class,
            
        ]);
    }
}

