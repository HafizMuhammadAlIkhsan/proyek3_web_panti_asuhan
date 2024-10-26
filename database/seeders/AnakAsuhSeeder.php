<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnakAsuhSeeder extends Seeder
{
    public function run()
    {
        DB::table('anak_asuh')->insert([
            'id_anak' => 1,
            'nama_anak' => 'Budi',
            'jenis_kelamin' => 'laki',
            'pendidikan' => 'SD',
            'status_ortu' => 'yatim',
            'tgl_lahir_anak_asuh' => '2015-06-01'
        ]);

        DB::table('anak_asuh')->insert([
            'id_anak' => 2,
            'nama_anak' => 'yanto',
            'jenis_kelamin' => 'laki',
            'pendidikan' => 'SMP',
            'status_ortu' => 'yatimPiatu',
            'tgl_lahir_anak_asuh' => '2010-06-01'
        ]);

        DB::table('anak_asuh')->insert([
            'id_anak' => 3,
            'nama_anak' => 'Sari',
            'jenis_kelamin' => 'Perempuan',
            'pendidikan' => 'SMa',
            'status_ortu' => 'Piatu',
            'tgl_lahir_anak_asuh' => '2006-06-01'
        ]);
    }
}

