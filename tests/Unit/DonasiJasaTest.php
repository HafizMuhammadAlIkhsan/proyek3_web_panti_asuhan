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

        $response = $this->post(route('jasa.insert'), $data);

        $this->assertDatabaseHas('donasi_jasa', [
            'email' => $data['email'],
            'nama_jasa' => $data['nama_jasa'],
            'deskripsi_jasa' => $data['deskripsi_jasa'],
            'jadwal_mulai' => $data['jadwal_mulai'],
            'jadwal_selesai' => $data['jadwal_selesai'],
        ]);

        $response->assertRedirect()
            ->assertSessionHas('success', 'Data donasi jasa berhasil ditambahkan.');
    }

    /** @test */
    public function handles_exception()
    {
        Admin::factory()->create();
        $admin = Admin::first();

        Auth::guard('admin')->login($admin);
        $data = [
            'email' => 'donatur@example.com',
            'nama_jasa' => 'Jasa Mengajar',
            'deskripsi_jasa' => 'Mengajar anak-anak setiap Sabtu.',
            'jadwal_mulai' => now()->addDays(2)->toDateString(),
            'jadwal_selesai' => now()->addDays(5)->toDateString(),
        ];

        $response = $this->post(route('jasa.insert'), $data);
        $response->assertRedirect()
            ->assertSessionHas('error', 'Terjadi kesalahan. Data gagal disimpan.');
    }

    /** @test */
    public function test_update_donasi_jasa_null()
    {
        Admin::factory()->create();
        $admin = Admin::first();

        $this->actingAs($admin, 'admin');

        $nonExistentId = 9999;
        $data = [
            'deskripsi_jasa' => 'Some description.',
            'jadwal_mulai' => now()->addDays(1)->toDateString(),
            'jadwal_selesai' => now()->addDays(5)->toDateString(),
        ];

        $response = $this->putJson(route('jasa.update', $nonExistentId), $data);

        $response->assertStatus(404);
    }
}
