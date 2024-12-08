<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use App\Models\Donatur;
use App\Models\DonasiJasa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class DonasiJasaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_insert_donasi_jasa_valid_data()
    {
        
        Admin::factory()->create();
        $donatur = Donatur::factory()->create();
        $admin = Admin::first();

        $this->actingAs($admin, 'admin');

 
        $data = [
            'email' => $donatur->email,
            'nama_jasa' => 'Jasa Mengajar',
            'deskripsi_jasa' => 'Mengajar anak-anak setiap Sabtu.',
            'jadwal_mulai' => now()->addDays(2)->toDateString(),
            'jadwal_selesai' => now()->addDays(5)->toDateString(),
        ];

        // Kirim request POST untuk menyimpan data
        $response = $this->post(route('jasa.insert'), $data);

        // Periksa apakah data tersimpan di database
        $this->assertDatabaseHas('donasi_jasa', [
            'email' => $data['email'],
            'nama_jasa' => $data['nama_jasa'],
            'deskripsi_jasa' => $data['deskripsi_jasa'],
            'jadwal_mulai' => $data['jadwal_mulai'],
            'jadwal_selesai' => $data['jadwal_selesai'],
        ]);

        // Periksa apakah respons mengarah ke halaman sebelumnya dan ada pesan sukses
        $response->assertRedirect()
            ->assertSessionHas('success', 'Data donasi jasa berhasil ditambahkan.');
    }

    /** @test */
    public function handles_exception()
    {
        // Buat admin
        Admin::factory()->create();
        $donatur = Donatur::factory()->create();
        $admin = Admin::first();


        // Login sebagai admin
        Auth::guard('admin')->login($admin);

        // Data valid
        $data = [
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Jasa Mengajar',
            'deskripsi_jasa' => 'Mengajar anak-anak setiap Sabtu.',
            'jadwal_mulai' => now()->addDays(2)->toDateString(),
            'jadwal_selesai' => now()->addDays(5)->toDateString(),
        ];

        // Simpan data
        $response = $this->post(route('jasa.insert'), $data);

        // Periksa respons error
        $response->assertRedirect()
            ->assertSessionHas('error', 'Terjadi kesalahan. Data gagal disimpan.');
    }
}
