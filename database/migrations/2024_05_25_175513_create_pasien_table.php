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
        Schema::create('pasien', function (Blueprint $table) {
            $table->char('id_pasien', length : 5)->primary();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->char('no_telepon', length : 12);
            $table->string('email')->unique();
            $table->foreign('email')->references('email')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
