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
        Schema::create('donatur', function (Blueprint $table) {
            $table->string('email', 50)->primary();
            $table->string('username', 50)->nullable();
            $table->string('password', 100);
            $table->date('tgl_lahir_donatur')->nullable();
            $table->string('kontak', 12)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->boolean('gender')->nullable();
            $table->string('kota', 30)->nullable();
            $table->timestamps();  // Kolom created_at dan updated_at
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->string('email_admin', 50)->primary();
            $table->string('nama_admin', 50);
            $table->string('password_admin', 50);
            $table->string('jabatan', 50);
            $table->timestamps(); 
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donatur');
        Schema::dropIfExists('pengurus');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
