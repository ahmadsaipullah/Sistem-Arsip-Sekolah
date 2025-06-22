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
        Schema::create('data_kepegawaians', function (Blueprint $table) {
            $table->id();
            // A. Data Identitas Pegawai
            $table->string('nama_lengkap');
            $table->string('nip_nik')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin'); // sebelumnya enum
            $table->text('alamat_lengkap');
            $table->string('nomor_telepon');
            $table->string('email')->unique();
            $table->string('status_kepegawaian'); // sebelumnya enum

            // B. Data Jabatan dan Riwayat Kerja
            $table->string('jabatan_terakhir');
            $table->string('unit_kerja');
            $table->date('tmt'); // Tanggal Mulai Tugas
            $table->string('golongan_pangkat');
            $table->string('nomor_sk_pengangkatan');
            $table->date('tanggal_sk');
            $table->string('instansi_pengangkat');
            $table->text('riwayat_sekolah_instansi_sebelumnya')->nullable();
            $table->text('riwayat_penugasan_tambahan')->nullable();

            // C. Data Pendidikan dan Sertifikasi
            $table->string('pendidikan_terakhir');
            $table->string('nama_lembaga_pendidikan');
            $table->string('jurusan');

            // D. Upload Dokumen (satu file PDF)
            $table->string('file_dokumen_pdf')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kepegawaians');
    }
};
