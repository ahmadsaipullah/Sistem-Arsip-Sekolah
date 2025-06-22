<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKepegawaian extends Model
{
    use HasFactory;

    protected $table = 'data_kepegawaians';

    protected $fillable = [
        // A. Data Identitas Pegawai
        'nama_lengkap',
        'nip_nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_lengkap',
        'nomor_telepon',
        'email',
        'status_kepegawaian',

        // B. Data Jabatan dan Riwayat Kerja
        'jabatan_terakhir',
        'unit_kerja',
        'tmt',
        'golongan_pangkat',
        'nomor_sk_pengangkatan',
        'tanggal_sk',
        'instansi_pengangkat',
        'riwayat_sekolah_instansi_sebelumnya',
        'riwayat_penugasan_tambahan',

        // C. Data Pendidikan dan Sertifikasi
        'pendidikan_terakhir',
        'nama_lembaga_pendidikan',
        'jurusan',

        // D. Upload Dokumen
        'file_dokumen_pdf',
    ];
}
