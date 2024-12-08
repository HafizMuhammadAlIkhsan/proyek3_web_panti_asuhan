<?php

namespace Database\Factories;

use App\Models\Donatur;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonaturFactory extends Factory
{
    protected $model = Donatur::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->userName,
            'nama_asli' => $this->faker->name,
            'password' => bcrypt('password'),
            'tgl_lahir_donatur' => $this->faker->date,
            'kontak' => $this->faker->numerify('081########'),
            'pekerjaan' => $this->faker->jobTitle,
            'gender' => $this->faker->boolean,
            'kota' => $this->faker->city,
        ];
    }
}
