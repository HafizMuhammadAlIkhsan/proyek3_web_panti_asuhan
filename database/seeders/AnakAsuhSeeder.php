<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnakAsuhSeeder extends Seeder
{
    public function run()
    {
        DB::table('data_anak')->insert([
            'nama_anak' => 'Budiman',
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan' => 'SD',
            'status_ortu' => 'Yatim',
            'tanggal_lahir' => '2015-06-01'
        ]);

        DB::table('data_anak')->insert([
            'nama_anak' => 'Yanto',
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan' => 'SMP',
            'status_ortu' => 'Yatim Piatu',
            'tanggal_lahir' => '2010-06-01'
        ]);

        DB::table('data_anak')->insert([
            'nama_anak' => 'SariRoti',
            'jenis_kelamin' => 'Perempuan',
            'pendidikan' => 'SMA',
            'status_ortu' => 'Piatu',
            'tanggal_lahir' => '2006-06-01'
        ]);
    }
}
