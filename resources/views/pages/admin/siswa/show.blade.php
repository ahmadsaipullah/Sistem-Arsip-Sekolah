@extends('layouts.template_default')
@section('title', 'Detail Data Siswa')
@section('siswa','active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-outline card-info">
            <div class="card-header py-2 bg-info">
                <h5 class="text-center m-0 text-white">Detail Data Siswa</h5>
            </div>
            <div class="card-body px-3 py-2">
                <div class="row g-3">
                    @php
                        $fields = [
                            'Nama Lengkap' => $siswa->nama_lengkap,
                            'NIS' => $siswa->nis,
                            'NISN' => $siswa->nisn,
                            'Tempat Lahir' => $siswa->tempat_lahir,
                            'Tanggal Lahir' => \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y'),
                            'Jenis Kelamin' => $siswa->jenis_kelamin,
                            'Agama' => $siswa->agama,
                            'Alamat Lengkap' => $siswa->alamat_lengkap,
                            'No HP' => $siswa->no_hp,
                            'Nama Ayah' => $siswa->nama_ayah,
                            'Nama Ibu' => $siswa->nama_ibu,
                            'Pekerjaan Orang Tua' => $siswa->pekerjaan_ortu,
                            'Alamat Orang Tua' => $siswa->alamat_ortu,
                            'No HP Orang Tua' => $siswa->no_hp_ortu,
                            'Kelas Sekarang' => $siswa->kelas_sekarang,
                            'Tahun Masuk' => $siswa->tahun_masuk,
                            'Riwayat Kenaikan Kelas' => $siswa->riwayat_kenaikan_kelas,
                        ];
                    @endphp

                    @foreach ($fields as $label => $value)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="border rounded p-2 h-100 bg-light">
                                <small class="text-muted">{{ $label }}</small>
                                <div class="fw-bold text-sm mt-1">{{ $value ?: '-' }}</div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12">
                        <div class="border rounded p-2 bg-light">
                            <small class="text-muted">Dokumen</small>
                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @foreach([
                                    'akta_kelahiran' => 'Akta Kelahiran',
                                    'kartu_keluarga' => 'Kartu Keluarga',
                                    'foto' => 'Foto',
                                    'nilai_rapor' => 'Nilai Rapor',
                                    'surat_mutasi' => 'Surat Mutasi',
                                ] as $field => $label)
                                    @if ($siswa->$field)
                                        <a href="{{ Storage::url($siswa->$field) }}" target="_blank" class="btn btn-sm btn-success">
                                            <i class="fa fa-file"></i> {{ $label }}
                                        </a>
                                    @endif
                                @endforeach

                                @if (
                                    !$siswa->akta_kelahiran &&
                                    !$siswa->kartu_keluarga &&
                                    !$siswa->foto &&
                                    !$siswa->nilai_rapor &&
                                    !$siswa->surat_mutasi
                                )
                                    <span class="text-muted">Tidak ada dokumen diunggah</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
