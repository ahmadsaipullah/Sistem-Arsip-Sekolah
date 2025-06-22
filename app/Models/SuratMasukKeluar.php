<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasukKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk_keluars';

    protected $fillable = [
        'jenis_surat',             // masuk / keluar
        'nomor_agenda',
        'tanggal_diterima',        // hanya digunakan untuk surat masuk
        'nomor_surat',
        'tanggal_surat',
        'pengirim_surat',          // bisa pengirim atau tujuan
        'perihal',
        'isi_ringkasan',
        'tujuan_surat',            // internal ke siapa
        'sifat_surat',             // Penting / Biasa / Rahasia
        'media_surat',             // Email / Fisik / Fax
        'disposisi',               // untuk tindak lanjut
        'keterangan_tambahan',
        'file_dokumen'             // path file PDF
    ];
}
