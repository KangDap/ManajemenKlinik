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
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->char('id_pasien', length : 5);
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->char('id_dokter', length : 5);
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
            $table->unsignedBigInteger('id_ruangan');
            $table->foreign('id_ruangan')->references('id')->on('ruangan');
            $table->date('tanggal_konsul');
            $table->time('jam_konsul');
            $table->enum('status', ['Diterima', 'Menunggu', 'Ditolak'])->default('Menunggu');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};
