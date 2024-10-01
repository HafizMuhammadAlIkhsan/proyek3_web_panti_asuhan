<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiJasaTable extends Migration
{
    public function up()
    {
        Schema::create('donasi_jasa', function (Blueprint $table) {
            $table->id();  // Kolom ID auto increment
            $table->string('email_admin')->default('pengurus@example.com');  // Default value
            $table->string('nama_jasa');
            $table->date('jadwal_mulai');
            $table->date('jadwal_selesai');
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('donasi_jasa');
    }
}

