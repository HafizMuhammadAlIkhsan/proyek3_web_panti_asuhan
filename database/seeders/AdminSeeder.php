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
    }
}
