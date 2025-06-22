@extends('layouts.template_default')
@section('title', 'Dokumen Sekolah')
@section('dokumen','active')
@section('content')
<div class="content-wrapper small">
    @include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Dokumen Sekolah</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right small">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dokumen Sekolah</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header py-2">
                    @if (!$dokumen)
                        <a class="btn btn-sm btn-primary" href="{{ route('dokumen-sekolah.create') }}">
                            <i class="fa fa-plus"></i> Tambah Dokumen
                        </a>
                    @else
                        <a class="btn btn-sm btn-warning" href="{{ route('dokumen-sekolah.edit', $dokumen->id) }}">
                            <i class="fa fa-pen"></i> Edit Dokumen
                        </a>
                    @endif
                </div>
                <div class="card-body p-2">
                    @if ($dokumen)
                        <div class="row g-3">
                            @php
                                $documents = [
                                    'profil_sekolah' => 'Profil Sekolah',
                                    'struktur_organisasi' => 'Struktur Organisasi Sekolah',
                                    'program_kerja_tahunan' => 'Program Kerja Tahunan',
                                    'kalender_pendidikan' => 'Kalender Pendidikan',
                                    'laporan_kegiatan' => 'Laporan Kegiatan',
                                    'dokumen_akreditasi' => 'Dokumen Akreditasi Sekolah',
                                ];
                            @endphp

                            @foreach($documents as $field => $label)
                                <div class="col-md-6 col-lg-4">
                                    <div class="border rounded p-2 h-100 bg-light">
                                        <small class="text-muted d-block">{{ $label }}</small>
                                        @if ($dokumen->$field)
                                            <a href="{{ Storage::url($dokumen->$field) }}" target="_blank" class="btn btn-sm btn-success mt-2">
                                                <i class="fa fa-file-pdf"></i> Lihat Dokumen
                                            </a>
                                        @else
                                            <span class="text-muted d-block mt-2">Belum diunggah</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info mb-0">
                            Belum ada dokumen yang diunggah.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
