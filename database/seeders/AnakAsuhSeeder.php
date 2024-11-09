<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnakAsuhSeeder extends Seeder
{
    public function run()
    {
        DB::table('data_anak')->insert([
            'nama_anak' => 'Budi',
            'jenis_kelamin' => 'laki',
            'pendidikan' => 'SD',
            'status_ortu' => 'yatim',
            'tanggal_lahir' => '2015-06-01'
        ]);

        DB::table('data_anak')->insert([
            'nama_anak' => 'yanto',
            'jenis_kelamin' => 'laki',
            'pendidikan' => 'SMP',
            'status_ortu' => 'yatimPiatu',
            'tanggal_lahir' => '2010-06-01'
        ]);

        DB::table('data_anak')->insert([
            'nama_anak' => 'Sari',
            'jenis_kelamin' => 'Perempuan',
            'pendidikan' => 'SMa',
            'status_ortu' => 'Piatu',
            'tanggal_lahir' => '2006-06-01'
        ]);
    }
}

