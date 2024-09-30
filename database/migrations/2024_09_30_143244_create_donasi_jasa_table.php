<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiJasaTable extends Migration
{
    public function up()
    {
        Schema::create('donasi_jasa', function (Blueprint $table) {
            $table->id();  // Kolom id otomatis auto-increment
            $table->string('EMAIL_PENGURUS');
            $table->string('NAMA_JASA');
            $table->date('JADWAL_MULAI');
            $table->date('JADWAL_SELESAI');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donasi_jasa');
    }
}

