<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSekolah extends Model
{
    use HasFactory;

    protected $table = 'dokumen_sekolahs'; // nama tabel di database

    protected $fillable = [
        'profil_sekolah',
        'struktur_organisasi',
        'program_kerja_tahunan',
        'kalender_pendidikan',
        'laporan_kegiatan',
        'dokumen_akreditasi',
    ];
}
