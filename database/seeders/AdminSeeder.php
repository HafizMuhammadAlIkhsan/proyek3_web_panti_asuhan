<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            'email_admin' => 'admin@example.com',
            'nama_pengurus' => 'Admin123',
            'password_admin' => bcrypt('password123'),
            'jabatan' => 'Manager'
        ]);

        DB::table('admin')->insert([
            'email_admin' => 'sulthan@example.com',
            'nama_pengurus' => 'Sulthan Aulia Rahman',
            'password_admin' => bcrypt('sulthan123'),
            'jabatan' => 'Admin'
        ]);

        DB::table('admin')->insert([
            'email_admin' => 'Jihan@example.com',
            'nama_pengurus' => 'JihanHumaira',
            'password_admin' => bcrypt('jihan123'),
            'jabatan' => 'Admin'
        ]);
        
        DB::table('admin')->insert([
            'email_admin' => 'hafiz@example.com',
            'nama_pengurus' => 'HafizMuhammadAlIkhsan',
            'password_admin' => bcrypt('hafiz123'),
            'jabatan' => 'Admin'
        ]);

        DB::table('admin')->insert([
            'email_admin' => 'agra@example.com',
            'nama_pengurus' => 'AgraAnisaIbtisamah',
            'password_admin' => bcrypt('agra123'),
            'jabatan' => 'Admin'
        ]);

        DB::table('admin')->insert([
            'email_admin' => 'ryuki@example.com',
            'nama_pengurus' => 'RyukiHagaBudiarto',
            'password_admin' => bcrypt('ryuki123'),
            'jabatan' => 'Admin'
        ]);
    }
}
