<?php

namespace Database\Factories;

use App\Models\DonasiJasa;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonasiJasaFactory extends Factory
{
    protected $model = DonasiJasa::class;

    public function definition()
    {
        return [
            'email_admin' => $this->faker->email,
            'email' => $this->faker->email,
            'nama_jasa' => $this->faker->words(3, true), // contoh: "Jasa Mengajar"
            'deskripsi_jasa' => $this->faker->sentence(10), // contoh deskripsi acak
            'jadwal_mulai' => $this->faker->dateTimeBetween('+1 days', '+7 days'),
            'jadwal_selesai' => $this->faker->dateTimeBetween('+8 days', '+14 days'),
            'status' => $this->faker->randomElement(['Diterima', 'Dibatalkan']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
