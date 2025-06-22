@extends('layouts.template_default')
@section('title', 'Tambah Data Surat')
@section('surat', 'active')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Tambah Data Surat</h5>
            </div>
            <form action="{{ route('surat-masuk-keluar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body small">
                    <div class="row g-2">
                        @php $col = 'col-md-4 form-group'; @endphp

                        <div class="{{ $col }}">
                            <label>Jenis Surat <span class="text-danger">*</span></label>
                            <select name="jenis_surat" class="form-control form-control-sm" required>
                                <option disabled selected>-- Pilih Jenis Surat --</option>
                                <option value="masuk">Surat Masuk</option>
                                <option value="keluar">Surat Keluar</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Nomor Agenda</label>
                            <input type="text" name="nomor_agenda" class="form-control form-control-sm"
                                   value="{{ old('nomor_agenda') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Nomor Surat <span class="text-danger">*</span></label>
                            <input type="text" name="nomor_surat" class="form-control form-control-sm"
                                   value="{{ old('nomor_surat') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control form-control-sm"
                                   value="{{ old('tanggal_diterima') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal Surat <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_surat" class="form-control form-control-sm"
                                   value="{{ old('tanggal_surat') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Pengirim Surat <span class="text-danger">*</span></label>
                            <input type="text" name="pengirim_surat" class="form-control form-control-sm"
                                   value="{{ old('pengirim_surat') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Perihal / Subjek <span class="text-danger">*</span></label>
                            <input type="text" name="perihal" class="form-control form-control-sm"
                                   value="{{ old('perihal') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Ringkasan Isi Surat</label>
                            <textarea name="isi_ringkasan" class="form-control form-control-sm">{{ old('isi_ringkasan') }}</textarea>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tujuan Surat (Internal) <span class="text-danger">*</span></label>
                            <input type="text" name="tujuan_surat" class="form-control form-control-sm"
                                   value="{{ old('tujuan_surat') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Sifat Surat</label>
                            <select name="sifat_surat" class="form-control form-control-sm">
                                <option value="">-- Pilih Sifat --</option>
                                <option value="Penting" {{ old('sifat_surat') == 'Penting' ? 'selected' : '' }}>Penting</option>
                                <option value="Biasa" {{ old('sifat_surat') == 'Biasa' ? 'selected' : '' }}>Biasa</option>
                                <option value="Rahasia" {{ old('sifat_surat') == 'Rahasia' ? 'selected' : '' }}>Rahasia</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Media Surat</label>
                            <select name="media_surat" class="form-control form-control-sm">
                                <option value="">-- Pilih Media --</option>
                                <option value="Fisik" {{ old('media_surat') == 'Fisik' ? 'selected' : '' }}>Fisik</option>
                                <option value="Email" {{ old('media_surat') == 'Email' ? 'selected' : '' }}>Email</option>
                                <option value="Fax" {{ old('media_surat') == 'Fax' ? 'selected' : '' }}>Fax</option>
                                <option value="PDF" {{ old('media_surat') == 'PDF' ? 'selected' : '' }}>PDF</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Disposisi</label>
                            <input type="text" name="disposisi" class="form-control form-control-sm"
                                   value="{{ old('disposisi') }}">
                            <small class="text-muted">Contoh: Kepala Sekolah, Guru, Wakil</small>
                        </div>

                        <div class="{{ $col }}">
                            <label>Keterangan Tambahan</label>
                            <textarea name="keterangan_tambahan" class="form-control form-control-sm">{{ old('keterangan_tambahan') }}</textarea>
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Upload File Dokumen (PDF)</label>
                            <input type="file" name="file_dokumen" class="form-control form-control-sm"
                                   accept="application/pdf">
                            <small class="text-muted d-block mt-2">* Dokumen yang perlu digabungkan dalam 1 file PDF:</small>
                            <ul class="text-muted small mt-1"
                                style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 0.3rem 1rem; padding-left: 1rem;">
                                <li>Surat undangan dari dinas</li>
                                <li>Surat keputusan kepala sekolah</li>
                                <li>Surat izin orang tua siswa</li>
                                <li>Surat balasan dari sekolah</li>
                                <li>Surat tugas guru</li>
                            </ul>
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
