<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'email_admin' => $this->faker->unique()->safeEmail,
            'nama_pengurus' => $this->faker->name,
            'password_admin' => bcrypt('password'), // Gunakan bcrypt untuk password
            'jabatan' => $this->faker->jobTitle,
        ];
    }
}
