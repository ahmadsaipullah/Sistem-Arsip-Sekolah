@extends('layouts.template_default')
@section('title', 'Detail Surat Masuk / Keluar')
@section('surat','active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-outline card-info">
            <div class="card-header py-2 bg-info">
                <h5 class="text-center m-0 text-white">Detail Surat Masuk / Keluar</h5>
            </div>
            <div class="card-body px-3 py-2">
                <div class="row g-3">
                    @php
                        $field = [
                            'Jenis Surat' => ucfirst($surat->jenis_surat),
                            'Nomor Agenda' => $surat->nomor_agenda,
                            'Nomor Surat' => $surat->nomor_surat,
                            'Tanggal Surat' => \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y'),
                            'Tanggal Diterima' => $surat->tanggal_diterima ? \Carbon\Carbon::parse($surat->tanggal_diterima)->format('d-m-Y') : '-',
                            'Pengirim Surat' => $surat->pengirim_surat,
                            'Tujuan Surat' => $surat->tujuan_surat,
                            'Perihal / Subjek' => $surat->perihal,
                            'Ringkasan Isi Surat' => $surat->isi_ringkasan,
                            'Sifat Surat' => $surat->sifat_surat,
                            'Media Surat' => $surat->media_surat,
                            'Disposisi' => $surat->disposisi,
                            'Keterangan Tambahan' => $surat->keterangan_tambahan,
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
                                @if ($surat->file_dokumen)
                                    <a href="{{ Storage::url($surat->file_dokumen) }}" target="_blank" class="btn btn-sm btn-primary">
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
                <a href="{{ route('surat-masuk-keluar.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
