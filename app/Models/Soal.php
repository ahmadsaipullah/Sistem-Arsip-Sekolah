<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soals';

    protected $fillable = [
        // Metadata Soal
        'nama_mapel',
        'jenjang_kelas',
        'semester',
        'jenis_soal',
        'tanggal_pembuatan',
        'nama_guru',
        'tujuan_pembelajaran',
        'tingkat_kesulitan',
        'format_soal',
        'jumlah_soal',
        'keterangan_tambahan',

        // Upload Dokumen
        'file_soal',
        'kunci_jawaban',
        'rubrik_penilaian',
        'pedoman_penskoran',
    ];
}
