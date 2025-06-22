@extends('layouts.template_default')
@section('title', 'Tambah Dokumen Sekolah')
@section('dokumen', 'active')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Tambah Dokumen Sekolah</h5>
            </div>
            <form action="{{ route('dokumen-sekolah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body small">
                    <div class="row g-3">
                        @php $col = 'col-md-6 form-group'; @endphp

                        <div class="{{ $col }}">
                            <label>Profil Sekolah <span class="text-danger">*</span></label>
                            <input type="file" name="profil_sekolah" class="form-control form-control-sm" required accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Struktur Organisasi Sekolah <span class="text-danger">*</span></label>
                            <input type="file" name="struktur_organisasi" class="form-control form-control-sm" required accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Program Kerja Tahunan <span class="text-danger">*</span></label>
                            <input type="file" name="program_kerja_tahunan" class="form-control form-control-sm" required accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Kalender Pendidikan <span class="text-danger">*</span></label>
                            <input type="file" name="kalender_pendidikan" class="form-control form-control-sm" required accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Laporan Kegiatan <span class="text-danger">*</span></label>
                            <input type="file" name="laporan_kegiatan" class="form-control form-control-sm" required accept="application/pdf">
                        </div>

                        <div class="{{ $col }}">
                            <label>Dokumen Akreditasi Sekolah <span class="text-danger">*</span></label>
                            <input type="file" name="dokumen_akreditasi" class="form-control form-control-sm" required accept="application/pdf">
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right py-2">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
