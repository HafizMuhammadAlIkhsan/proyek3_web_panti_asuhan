<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataAnak;

class AnakAsuhSeeder extends Seeder
{
    public function run()
    {
        DataAnak::create([
            'nama_anak' => 'Yanto',
            'pendidikan' => 'SD',
            'jenis_kelamin' => 'Laki-laki',
            'status_ortu' => 'Yatim',
            'tanggal_lahir' => '2015-05-10',
            'email_panti' => 'panti1@example.com',
        ]);

        DataAnak::create([
            'nama_anak' => 'Anak B',
            'pendidikan' => 'SMP',
            'jenis_kelamin' => 'Perempuan',
            'status_ortu' => 'Piatu',
            'tanggal_lahir' => '2012-08-15',
            'email_panti' => 'panti2@example.com',
        ]);
    }
}
