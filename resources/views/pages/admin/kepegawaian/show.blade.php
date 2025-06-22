@extends('layouts.template_default')
@section('title', 'Detail Data Kepegawaian')
@section('kepegawaian','active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-outline card-info">
            <div class="card-header py-2 bg-info">
                <h5 class="text-center m-0 text-white">Detail Data Kepegawaian</h5>
            </div>
            <div class="card-body px-3 py-2">
                <div class="row g-3">

                    @php
                        $field = [
                            'Nama Lengkap' => $pegawai->nama_lengkap,
                            'NIP / NIK' => $pegawai->nip_nik,
                            'Tempat, Tanggal Lahir' => $pegawai->tempat_lahir . ', ' . \Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('d-m-Y'),
                            'Jenis Kelamin' => $pegawai->jenis_kelamin,
                            'Alamat Lengkap' => $pegawai->alamat_lengkap,
                            'Nomor Telepon' => $pegawai->nomor_telepon,
                            'Email' => $pegawai->email,
                            'Status Kepegawaian' => $pegawai->status_kepegawaian,
                            'Jabatan Terakhir' => $pegawai->jabatan_terakhir,
                            'Unit Kerja' => $pegawai->unit_kerja,
                            'TMT' => $pegawai->tmt,
                            'Golongan / Pangkat' => $pegawai->golongan_pangkat,
                            'Nomor SK Pengangkatan' => $pegawai->nomor_sk_pengangkatan,
                            'Tanggal SK' => $pegawai->tanggal_sk,
                            'Instansi Pengangkat' => $pegawai->instansi_pengangkat,
                            'Riwayat Sekolah / Instansi Sebelumnya' => $pegawai->riwayat_sekolah_instansi_sebelumnya,
                            'Riwayat Penugasan Tambahan' => $pegawai->riwayat_penugasan_tambahan,
                            'Pendidikan Terakhir' => $pegawai->pendidikan_terakhir,
                            'Nama Lembaga Pendidikan' => $pegawai->nama_lembaga_pendidikan,
                            'Jurusan' => $pegawai->jurusan,
                        ];
                    @endphp

                    @foreach ($field as $label => $value)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="border rounded p-2 h-100 bg-light">
                                <small class="text-muted">{{ $label }}</small>
                                <div class="fw-bold text-sm mt-1">{{ $value ?: '-' }}</div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12">
                        <div class="border rounded p-2 bg-light">
                            <small class="text-muted">Dokumen PDF</small>
                            <div class="mt-1">
                                @if ($pegawai->file_dokumen_pdf)
                                    <a href="{{ Storage::url($pegawai->file_dokumen_pdf) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fa fa-file-pdf"></i> Lihat Dokumen
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada dokumen diunggah</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
                <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('data-kepegawaian.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
