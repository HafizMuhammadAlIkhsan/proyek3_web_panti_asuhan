<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonasiJasaSeeder extends Seeder
{
    public function run()
    {
        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar Tinju',
            'deskripsi_jasa' => 'Swayback lesson',
            'jadwal_mulai' => '2024-1-1',
            'jadwal_selesai' => '2024-1-2'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'sulthan@example.com',
            'nama_jasa' => 'Mengajar Biologi',
            'deskripsi_jasa' => 'Mengajar Biologi tingkat SMA',
            'jadwal_mulai' => '2024-1-2',
            'jadwal_selesai' => '2024-1-3'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'sulthan@example.com',
            'nama_jasa' => 'Mengajar MTK',
            'deskripsi_jasa' => 'Mengajar Matematika tingkat SMA Matriks',
            'jadwal_mulai' => '2024-1-3',
            'jadwal_selesai' => '2024-1-4'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar silat',
            'deskripsi_jasa' => 'Taka1',
            'jadwal_mulai' => '2024-1-4',
            'jadwal_selesai' => '2024-1-5'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar Menulis',
            'deskripsi_jasa' => 'Pelajaran Katakana',
            'jadwal_mulai' => '2024-1-5',
            'jadwal_selesai' => '2024-1-6'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar Berbahasa',
            'deskripsi_jasa' => 'Bahasa C++',
            'jadwal_mulai' => '2024-1-6',
            'jadwal_selesai' => '2024-1-7'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar penjas',
            'deskripsi_jasa' => 'Lorem ipsum',
            'jadwal_mulai' => '2024-1-7',
            'jadwal_selesai' => '2024-1-8'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Lorem ipsum',
            'deskripsi_jasa' => 'Lorem ipsum',
            'jadwal_mulai' => '2024-1-8',
            'jadwal_selesai' => '2024-1-9'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Mengajar penjas',
            'deskripsi_jasa' => 'Lorem ipsum',
            'jadwal_mulai' => '2024-1-9',
            'jadwal_selesai' => '2024-1-10'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Lorem ipsum',
            'deskripsi_jasa' => 'Lorem ipsum',
            'jadwal_mulai' => '2024-1-10',
            'jadwal_selesai' => '2024-1-11'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'sulthan@example.com',
            'nama_jasa' => 'Mengajar Biologi',
            'deskripsi_jasa' => 'Mengajar Biologi tingkat SMA',
            'jadwal_mulai' => '2024-1-11',
            'jadwal_selesai' => '2024-1-12'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'sulthan@example.com',
            'nama_jasa' => 'Mengajar MTK',
            'deskripsi_jasa' => 'Mengajar Matematika tingkat SMA Matriks',
            'jadwal_mulai' => '2024-1-12',
            'jadwal_selesai' => '2024-1-13'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'ryuki@example.com',
            'nama_jasa' => 'Mengajar Brawlhalla',
            'deskripsi_jasa' => 'Mengajar Biologi tingkat SMA',
            'jadwal_mulai' => '2024-1-13',
            'jadwal_selesai' => '2024-1-14'
        ]);

        DB::table('donasi_jasa')->insert([
            'email_admin' => 'admin@example.com',
            'email' => 'hafiz@example.com',
            'nama_jasa' => 'Mengajar Biologi',
            'deskripsi_jasa' => 'Mengajar Matematika tingkat SMA Matriks',
            'jadwal_mulai' => '2024-1-14',
            'jadwal_selesai' => '2024-1-1'
        ]);
    }
}


