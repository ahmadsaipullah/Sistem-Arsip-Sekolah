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
        Schema::create('dokumen_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('profil_sekolah')->nullable(); // file path
            $table->string('struktur_organisasi')->nullable();
            $table->string('program_kerja_tahunan')->nullable();
            $table->string('kalender_pendidikan')->nullable();
            $table->string('laporan_kegiatan')->nullable();
            $table->string('dokumen_akreditasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_sekolahs');
    }
};
