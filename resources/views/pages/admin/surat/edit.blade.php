@extends('layouts.template_default')
@section('title', 'Edit Surat Masuk / Keluar')
@section('surat','active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Edit Surat Masuk / Keluar</h5>
            </div>
            <form action="{{ route('surat-masuk-keluar.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body px-3 py-2">
                    <div class="row g-2">
                        @php $col = 'col-12 col-md-4 form-group'; @endphp

                        <div class="{{ $col }}">
                            <label>Jenis Surat</label>
                            <select name="jenis_surat" class="form-control form-control-sm" required>
                                <option value="masuk" {{ $surat->jenis_surat == 'masuk' ? 'selected' : '' }}>Surat Masuk</option>
                                <option value="keluar" {{ $surat->jenis_surat == 'keluar' ? 'selected' : '' }}>Surat Keluar</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Nomor Agenda</label>
                            <input type="text" name="nomor_agenda" class="form-control form-control-sm"
                                value="{{ old('nomor_agenda', $surat->nomor_agenda) }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control form-control-sm"
                                value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control form-control-sm"
                                value="{{ old('tanggal_diterima', $surat->tanggal_diterima) }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control form-control-sm"
                                value="{{ old('tanggal_surat', $surat->tanggal_surat) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Pengirim Surat</label>
                            <input type="text" name="pengirim_surat" class="form-control form-control-sm"
                                value="{{ old('pengirim_surat', $surat->pengirim_surat) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Perihal / Subjek</label>
                            <input type="text" name="perihal" class="form-control form-control-sm"
                                value="{{ old('perihal', $surat->perihal) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Ringkasan Isi Surat</label>
                            <textarea name="isi_ringkasan" class="form-control form-control-sm" rows="2">{{ old('isi_ringkasan', $surat->isi_ringkasan) }}</textarea>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tujuan Surat</label>
                            <input type="text" name="tujuan_surat" class="form-control form-control-sm"
                                value="{{ old('tujuan_surat', $surat->tujuan_surat) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Sifat Surat</label>
                            <select name="sifat_surat" class="form-control form-control-sm">
                                <option value="">-- Pilih Sifat --</option>
                                <option value="Penting" {{ $surat->sifat_surat == 'Penting' ? 'selected' : '' }}>Penting</option>
                                <option value="Biasa" {{ $surat->sifat_surat == 'Biasa' ? 'selected' : '' }}>Biasa</option>
                                <option value="Rahasia" {{ $surat->sifat_surat == 'Rahasia' ? 'selected' : '' }}>Rahasia</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Media Surat</label>
                            <select name="media_surat" class="form-control form-control-sm">
                                <option value="">-- Pilih Media --</option>
                                <option value="Fisik" {{ $surat->media_surat == 'Fisik' ? 'selected' : '' }}>Fisik</option>
                                <option value="Email" {{ $surat->media_surat == 'Email' ? 'selected' : '' }}>Email</option>
                                <option value="Fax" {{ $surat->media_surat == 'Fax' ? 'selected' : '' }}>Fax</option>
                                <option value="PDF" {{ $surat->media_surat == 'PDF' ? 'selected' : '' }}>PDF</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Disposisi</label>
                            <input type="text" name="disposisi" class="form-control form-control-sm"
                                value="{{ old('disposisi', $surat->disposisi) }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Keterangan Tambahan</label>
                            <textarea name="keterangan_tambahan" class="form-control form-control-sm">{{ old('keterangan_tambahan', $surat->keterangan_tambahan) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Upload File Surat / Dokumen (PDF)</label>
                            <input type="file" name="file_dokumen" class="form-control form-control-sm" accept="application/pdf">
                            <small class="text-muted d-block mt-2">* Dokumen yang perlu digabungkan dalam 1 file PDF:</small>
                            <ul class="text-muted small mt-1"
                                style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.3rem 1rem; padding-left: 1rem;">
                                <li>Surat undangan dari dinas</li>
                                <li>Surat keputusan kepala sekolah</li>
                                <li>Surat izin orang tua siswa</li>
                                <li>Surat balasan dari sekolah</li>
                                <li>Surat tugas guru</li>
                            </ul>
                        </div>

                        <div class="col-md-6 d-flex align-items-end">
                            @if ($surat->file_dokumen)
                                <a href="{{ Storage::url($surat->file_dokumen) }}" target="_blank" class="btn btn-sm btn-info mt-3">
                                    <i class="fa fa-file-pdf"></i> Lihat Dokumen Lama
                                </a>
                            @else
                                <span class="text-muted mt-3">Tidak ada dokumen lama</span>
                            @endif
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
