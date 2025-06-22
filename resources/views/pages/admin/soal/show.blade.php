@extends('layouts.template_default')
@section('title', 'Detail Data Soal')
@section('soal','active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-outline card-info">
            <div class="card-header py-2 bg-info">
                <h5 class="text-center m-0 text-white">Detail Data Soal</h5>
            </div>
            <div class="card-body px-3 py-2">
                <div class="row g-3">
                    @php
                        $field = [
                            'Nama Mata Pelajaran' => $soal->nama_mapel,
                            'Jenjang Kelas' => $soal->jenjang_kelas,
                            'Semester / Tahun Ajaran' => $soal->semester,
                            'Jenis Soal' => $soal->jenis_soal,
                            'Tanggal Pembuatan' => \Carbon\Carbon::parse($soal->tanggal_pembuatan)->format('d-m-Y'),
                            'Nama Guru Pembuat' => $soal->nama_guru,
                            'Tujuan Pembelajaran' => $soal->tujuan_pembelajaran,
                            'Tingkat Kesulitan' => $soal->tingkat_kesulitan,
                            'Format Soal' => $soal->format_soal,
                            'Jumlah Soal' => $soal->jumlah_soal,
                            'Keterangan Tambahan' => $soal->keterangan_tambahan,
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
                            <small class="text-muted">Dokumen</small>
                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @foreach([
                                    'file_soal' => 'File Soal',
                                    'kunci_jawaban' => 'Kunci Jawaban',
                                    'rubrik_penilaian' => 'Rubrik Penilaian',
                                    'pedoman_penskoran' => 'Pedoman Penskoran'
                                ] as $field => $label)
                                    @if ($soal->$field)
                                        <a href="{{ Storage::url($soal->$field) }}" target="_blank" class="btn btn-sm btn-success">
                                            <i class="fa fa-file-pdf"></i> {{ $label }}
                                        </a>
                                    @endif
                                @endforeach

                                @if (!$soal->file_soal && !$soal->kunci_jawaban && !$soal->rubrik_penilaian && !$soal->pedoman_penskoran)
                                    <span class="text-muted">Tidak ada dokumen diunggah</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('soal.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
