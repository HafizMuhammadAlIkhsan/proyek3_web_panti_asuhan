<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        DB::table('berita')->insert([
            'id_berita' => 1,
            'email_admin' => 'admin@example.com',
            'nama_berita' => 'Berita Donasi',
            'isi_berita' => 'Lorem Ipsum Dolor Sit amet.',
            'tgl_upload' => now(),
            'gambar_berita' => 'img01'
        ]);
    }
}

