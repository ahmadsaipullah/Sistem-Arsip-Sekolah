@extends('layouts.template_default')
@section('title', 'Tambah Data Soal')
@section('soal', 'active')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Tambah Data Soal</h5>
            </div>
            <form action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body small">
                    <div class="row g-2">
                        @php $col = 'col-md-4 form-group'; @endphp

                        <div class="{{ $col }}">
                            <label>Nama Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" name="nama_mapel" class="form-control form-control-sm" required value="{{ old('nama_mapel') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Jenjang Kelas <span class="text-danger">*</span></label>
                            <input type="text" name="jenjang_kelas" class="form-control form-control-sm" required value="{{ old('jenjang_kelas') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Semester / Tahun Ajaran <span class="text-danger">*</span></label>
                            <input type="text" name="semester" class="form-control form-control-sm" required value="{{ old('semester') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Jenis Soal <span class="text-danger">*</span></label>
                            <input type="text" name="jenis_soal" class="form-control form-control-sm" required value="{{ old('jenis_soal') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal Pembuatan / Unggah <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_pembuatan" class="form-control form-control-sm" required value="{{ old('tanggal_pembuatan') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Nama Guru Pembuat Soal <span class="text-danger">*</span></label>
                            <input type="text" name="nama_guru" class="form-control form-control-sm" required value="{{ old('nama_guru') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Tujuan Pembelajaran</label>
                            <textarea name="tujuan_pembelajaran" class="form-control form-control-sm">{{ old('tujuan_pembelajaran') }}</textarea>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tingkat Kesulitan Soal</label>
                            <select name="tingkat_kesulitan" class="form-control form-control-sm">
                                <option value="">-- Pilih Tingkat --</option>
                                <option value="Mudah" {{ old('tingkat_kesulitan') == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                                <option value="Sedang" {{ old('tingkat_kesulitan') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="Sulit" {{ old('tingkat_kesulitan') == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Format Soal</label>
                            <input type="text" name="format_soal" class="form-control form-control-sm" value="{{ old('format_soal') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Jumlah Soal</label>
                            <input type="number" name="jumlah_soal" class="form-control form-control-sm" value="{{ old('jumlah_soal') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Keterangan Tambahan</label>
                            <textarea name="keterangan_tambahan" class="form-control form-control-sm">{{ old('keterangan_tambahan') }}</textarea>
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Upload Dokumen</label>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>File Soal (PDF)</label>
                                    <input type="file" name="file_soal" class="form-control form-control-sm" accept="application/pdf">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Kunci Jawaban (PDF)</label>
                                    <input type="file" name="kunci_jawaban" class="form-control form-control-sm" accept="application/pdf">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Rubrik Penilaian (PDF)</label>
                                    <input type="file" name="rubrik_penilaian" class="form-control form-control-sm" accept="application/pdf">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Pedoman Penskoran (PDF)</label>
                                    <input type="file" name="pedoman_penskoran" class="form-control form-control-sm" accept="application/pdf">
                                </div>
                            </div>
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
