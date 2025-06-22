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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
              // Bagian A: Metadata Soal
            $table->string('nama_mapel'); // Nama Mata Pelajaran
            $table->string('jenjang_kelas'); // Jenjang Kelas
            $table->string('semester'); // Semester / Tahun Ajaran
            $table->string('jenis_soal'); // Jenis Soal
            $table->date('tanggal_pembuatan')->nullable(); // Tanggal Pembuatan / Unggah
            $table->string('nama_guru'); // Nama Guru Pembuat Soal
            $table->text('tujuan_pembelajaran')->nullable(); // Tujuan Pembelajaran
            $table->string('tingkat_kesulitan')->nullable(); // Mudah / Sedang / Sulit
            $table->string('format_soal')->nullable(); // Format Soal
            $table->integer('jumlah_soal')->nullable(); // Jumlah Soal
            $table->text('keterangan_tambahan')->nullable(); // Keterangan Tambahan

            // Bagian B: Upload Dokumen
            $table->string('file_soal')->nullable(); // File Soal
            $table->string('kunci_jawaban')->nullable(); // Kunci Jawaban
            $table->string('rubrik_penilaian')->nullable(); // Rubrik Penilaian / Pembobotan
            $table->string('pedoman_penskoran')->nullable(); // Pedoman Penskoran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
