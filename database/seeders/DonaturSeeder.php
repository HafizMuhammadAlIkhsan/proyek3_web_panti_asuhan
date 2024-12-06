<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonaturSeeder extends Seeder
{
    public function run()
    {
        DB::table('donatur')->insert([
            'email' => 'donatur@example.com',
            'username' => 'donatur123',
            'nama_asli' => 'Donatur1',
            'password' => bcrypt('donatur123'),
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '123456789012',
            'pekerjaan' => 'Guru',
            'gender' => true,
            'kota' => 'Jakarta'
        ]);

        DB::table('donatur')->insert([
            'email' => 'sulthan@example.com',
            'username' => 'sulthan123',
            'nama_asli' => 'sulthan',
            'password' => bcrypt('sulthan123'),
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '085860631381',
            'pekerjaan' => 'Programmer',
            'gender' => true,
            'kota' => 'Bandung'
        ]);

        DB::table('donatur')->insert([
            'email' => 'hafiz@example.com',
            'username' => 'hafiz123',
            'nama_asli' => 'hafiz',
            'password' => bcrypt('hafiz123'),
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '123456789012',
            'pekerjaan' => 'Programmer',
            'gender' => true,
            'kota' => 'Cimahi'
        ]);

        DB::table('donatur')->insert([
            'email' => 'ryuki@example.com',
            'username' => 'ryuki123',
            'nama_asli' => 'ryuki',
            'password' => bcrypt('ryuki123'),
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '123456789012',
            'pekerjaan' => 'Programmer',
            'gender' => true,
            'kota' => 'Garut'
        ]);

        DB::table('donatur')->insert([
            'email' => 'agra@example.com',
            'username' => 'agra123',
            'nama_asli' => 'agra',
            'password' => bcrypt('agra123'),
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '123456789012',
            'pekerjaan' => 'Gamer',
            'gender' => true,
            'kota' => 'soreang'
        ]);

        DB::table('donatur')->insert([
            'email' => 'jihan@example.com',
            'username' => 'jihan123',
            'nama_asli' => 'jihan',
            'password' => bcrypt('jihan123'),
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '123456789012',
            'pekerjaan' => 'Programmer',
            'gender' => true,
            'kota' => 'Kopo'
        ]);

        DB::table('donatur')->insert([
            'email' => 'anonim@example.com',
            'username' => 'Anonnim',
            'nama_asli' => 'anonim',
            'password' => bcrypt('notapasswordwantothree'),
            'tgl_lahir_donatur' => '1990-01-01',
            'kontak' => '123456789012',
            'pekerjaan' => 'Programmer',
            'gender' => true,
            'kota' => 'anonim'
        ]);
    }
}

