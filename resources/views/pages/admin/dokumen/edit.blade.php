@extends('layouts.template_default')
@section('title', 'Edit Dokumen Sekolah')
@section('soal', 'active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Edit Dokumen Sekolah</h5>
            </div>
            <form action="{{ route('dokumen-sekolah.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body px-3 py-2">
                    <div class="row g-3">
                        @php $col = 'col-md-6 form-group'; @endphp

                        <div class="{{ $col }}">
                            <label>Profil Sekolah</label>
                            <input type="file" name="profil_sekolah" class="form-control form-control-sm" accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Struktur Organisasi Sekolah</label>
                            <input type="file" name="struktur_organisasi" class="form-control form-control-sm" accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Program Kerja Tahunan</label>
                            <input type="file" name="program_kerja_tahunan" class="form-control form-control-sm" accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Kalender Pendidikan</label>
                            <input type="file" name="kalender_pendidikan" class="form-control form-control-sm" accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Laporan Kegiatan</label>
                            <input type="file" name="laporan_kegiatan" class="form-control form-control-sm" accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Dokumen Akreditasi Sekolah</label>
                            <input type="file" name="dokumen_akreditasi" class="form-control form-control-sm" accept="application/pdf">
                        </div>

                        <div class="col-md-12 d-flex flex-wrap gap-2 mt-2">
                            @foreach([
                                'profil_sekolah' => 'Profil Sekolah',
                                'struktur_organisasi' => 'Struktur Organisasi',
                                'program_kerja_tahunan' => 'Program Kerja Tahunan',
                                'kalender_pendidikan' => 'Kalender Pendidikan',
                                'laporan_kegiatan' => 'Laporan Kegiatan',
                                'dokumen_akreditasi' => 'Dokumen Akreditasi'
                            ] as $field => $label)
                                @if ($dokumen->$field)
                                    <a href="{{ Storage::url($dokumen->$field) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-file-pdf"></i> Lihat {{ $label }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
