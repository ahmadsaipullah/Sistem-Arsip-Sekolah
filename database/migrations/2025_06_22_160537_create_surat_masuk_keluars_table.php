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
        Schema::create('surat_masuk_keluars', function (Blueprint $table) {
           $table->id();
            $table->string('jenis_surat'); // masuk, keluar (gunakan string)
            $table->string('nomor_agenda')->nullable();
            $table->date('tanggal_diterima')->nullable(); // hanya digunakan jika jenis surat = masuk
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('pengirim_surat'); // bisa pengirim atau tujuan surat
            $table->string('perihal');
            $table->text('isi_ringkasan')->nullable();
            $table->string('tujuan_surat'); // untuk siapa di sekolah
            $table->string('sifat_surat')->nullable(); // Penting / Biasa / Rahasia
            $table->string('media_surat')->nullable(); // Fisik / Email / Fax / PDF
            $table->string('disposisi')->nullable(); // Tujuan tindak lanjut (misal: Kepala Sekolah)
            $table->text('keterangan_tambahan')->nullable();
            $table->string('file_dokumen')->nullable(); // untuk file PDF upload
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk_keluars');
    }
};
