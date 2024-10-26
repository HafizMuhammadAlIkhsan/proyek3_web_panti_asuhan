<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_anak', function (Blueprint $table) {
            $table->id('id_anak');
            $table->string('nama_anak');
            $table->string('jenis_kelamin');
            $table->string('pendidikan');
            $table->string('status_ortu');
            $table->date('tanggal_lahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_anak');
    }
};
