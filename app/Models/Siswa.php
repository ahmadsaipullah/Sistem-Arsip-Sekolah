<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        // A. Data Identitas Siswa
        'nama_lengkap',
        'nis',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat_lengkap',
        'no_hp',

        // B. Data Orang Tua / Wali
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ortu',
        'alamat_ortu',
        'no_hp_ortu',

        // C. Data Akademik
        'kelas_sekarang',
        'tahun_masuk',
        'riwayat_kenaikan_kelas',

        // D. Data Administratif (Dokumen)
        'akta_kelahiran',
        'kartu_keluarga',
        'foto',
        'nilai_rapor',
        'surat_mutasi',
    ];
}
