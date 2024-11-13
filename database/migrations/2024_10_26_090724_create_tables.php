<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    public function up()
    {
        // Table: MASYARAKAT
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->char('email', 50)->primary();
            $table->string('nama_asli', 50);
        });

        // Tabel DONATUR
        Schema::create('donatur', function (Blueprint $table) {
            $table->char('email', 50)->primary();
            $table->string('username', 50);
            $table->string('nama_asli', 50)->nullable();
            $table->string('password', 60);
            $table->date('tgl_lahir_donatur')->nullable();
            $table->decimal('kontak', 12, 0);
            $table->string('pekerjaan', 50)->nullable();
            $table->boolean('gender')->nullable();
            $table->char('kota', 30)->nullable();
        });

        // Tabel ADMIN
        Schema::create('admin', function (Blueprint $table) {
            $table->char('email_admin', 50)->primary();
            $table->string('nama_pengurus', 50);
            $table->string('password_admin', 60);
            $table->string('jabatan', 50);
        });

        // Tabel BERITA
        Schema::create('berita', function (Blueprint $table) {
            $table->increments('id_berita')->primary();
            $table->char('email_admin', 50);
            $table->string('nama_berita', 50);
            $table->text('isi_berita');
            $table->date('tgl_upload');
            $table->boolean('status')->default(false);
            $table->string('gambar_berita')->nullable(); //Gambar cover
            $table->foreign('email_admin')->references('email_admin')->on('admin')->restrictOnDelete()->restrictOnUpdate();
        });

        // Tabel DONASI_BARANG
        Schema::create('donasi_barang', function (Blueprint $table) {
            $table->increments('id_donasi_barang'); // ID nya Karena increment Sifat nya jadi akan terus bertambah dan pasti unik Di gunakan Untuk Fetch
            $table->char('email_admin', 50)->nullable();
            $table->char('email', 50);
            $table->string('nama_barang', 50);
            $table->integer('jumlah_barang');
            $table->date('tanggal_verifikasi_barang');
            $table->string('bukti_foto')->nullable();
            $table->enum('status', ['Diterima', 'Menunggu_pengiriman', 'Dibatalkan', 'Diproses'])->default('Diproses');
            $table->timestamps(); //Untuk Order by nya agar yang baru paling ata maka by ASC.
            $table->enum('metode_pengiriman', ['Jasa Pengiriman', 'Pengiriman Mandiri'])->nullable();
            $table->primary(['id_donasi_barang', 'email']);
            $table->foreign('email')->references('email')->on('donatur')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('email_admin')->references('email_admin')->on('admin')->restrictOnDelete()->restrictOnUpdate();
        });

        // Tabel DONASI_JASA
        Schema::create('donasi_jasa', function (Blueprint $table) {
            $table->increments('id_donasi_jasa');
            $table->char('email_admin', 50)->nullable();
            $table->char('email', 50);
            $table->string('nama_jasa', 50);
            $table->string('deskripsi_jasa', 500);
            $table->date('jadwal_mulai');
            $table->date('jadwal_selesai')->nullable();
            $table->enum('status', ['Diterima', 'Dibatalkan'])->default('Diterima');
            $table->timestamps();
            $table->primary(['id_donasi_jasa', 'email']);
            $table->foreign('email')->references('email')->on('donatur')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('email_admin')->references('email_admin')->on('admin')->restrictOnDelete()->restrictOnUpdate();
        });

        // Tabel DONASI_UANG
        Schema::create('donasi_uang', function (Blueprint $table) {
            $table->increments('id_donasi_uang');
            $table->char('email_admin', 50)->nullable();
            $table->char('email', 50)->default('Anonim');
            $table->integer('jumlah_uang');
            $table->string('cara_pembayaran', 30);
            $table->date('tanggal_donasi_uang');
            $table->String('bukti_transfer');
            $table->enum('status', ['Diterima', 'Dibatalkan', 'Diproses'])->default('Diproses');
            $table->primary(['id_donasi_uang', 'email']);
            $table->timestamps();
            $table->foreign('email')->references('email')->on('donatur')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('email_admin')->references('email_admin')->on('admin')->restrictOnDelete()->restrictOnUpdate();
        });


        // Table: PANTI_ASUHAN
        Schema::create('panti_asuhan', function (Blueprint $table) {
            $table->char('email_panti', 50)->primary();
            $table->string('nama_panti', 50);
            $table->string('lokasi_panti', 255);
            $table->integer('nomer_cp')->nullable();
        });

        // Table: REKENING
        Schema::create('rekening', function (Blueprint $table) {
            $table->increments('id_rekening');
            $table->char('email_panti', 50);
            $table->string('no_rekening', 30);
            $table->string('nama_bank', 30);
            $table->foreign('email_panti')->references('email_panti')->on('panti_asuhan')->onDelete('restrict')->onUpdate('restrict');
        });

        // Tabel ANAK_ASUH
        Schema::create('data_anak', function (Blueprint $table) {
            $table->increments('id_anak')->primary();
            $table->string('nama_anak', 50);
            $table->string('pendidikan');
            $table->string('jenis_kelamin');
            $table->string('status_ortu', 30);
            $table->date('tanggal_lahir');
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('donasi_barang');
        Schema::dropIfExists('donasi_jasa');
        Schema::dropIfExists('donasi_uang');
        Schema::dropIfExists('donatur');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('masyarakat');
        Schema::dropIfExists('panti_asuhan');
        Schema::dropIfExists('data_anak');
        Schema::dropIfExists('rekening');
    }
}
