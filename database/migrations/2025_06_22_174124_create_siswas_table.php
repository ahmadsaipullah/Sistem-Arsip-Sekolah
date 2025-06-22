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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
             // A. Data Identitas Siswa
            $table->string('nama_lengkap');
            $table->string('nis')->unique();
            $table->string('nisn')->nullable()->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin'); // Laki-laki / Perempuan
            $table->string('agama');
            $table->text('alamat_lengkap');
            $table->string('no_hp')->nullable();

            // B. Data Orang Tua / Wali
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ortu')->nullable();
            $table->text('alamat_ortu')->nullable();
            $table->string('no_hp_ortu')->nullable();

            // C. Data Akademik
            $table->string('kelas_sekarang');
            $table->year('tahun_masuk');
            $table->text('riwayat_kenaikan_kelas')->nullable();

            // D. Data Administratif (Upload Dokumen)
            $table->string('akta_kelahiran')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('foto')->nullable();
            $table->string('nilai_rapor')->nullable();
            $table->string('surat_mutasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
