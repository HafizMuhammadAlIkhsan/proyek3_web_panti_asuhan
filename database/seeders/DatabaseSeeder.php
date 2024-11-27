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
            DonasiBarangSeeder::class,
            DonasiJasaSeeder::class,
            // DonasiUangSeeder::class,
            PantiAsuhanSeeder::class,
            AnakAsuhSeeder::class,
            RekeningSeeder::class
        ]);
    }
}
