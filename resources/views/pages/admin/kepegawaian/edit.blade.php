@extends('layouts.template_default')
@section('title', 'Edit Data Kepegawaian')
@section('kepegawaian','active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Edit Data Kepegawaian</h5>
            </div>
            <form action="{{ route('data-kepegawaian.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body px-3 py-2">
                    <div class="row g-2">
                        @php $col = 'col-12 col-md-4 form-group'; @endphp

                        <div class="{{ $col }}">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-sm"
                                value="{{ old('nama_lengkap', $pegawai->nama_lengkap ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>NIP / NIK</label>
                            <input type="text" name="nip_nik" class="form-control form-control-sm"
                                value="{{ old('nip_nik', $pegawai->nip_nik ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control form-control-sm"
                                value="{{ old('tempat_lahir', $pegawai->tempat_lahir ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control form-control-sm"
                                value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control form-control-sm" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" class="form-control form-control-sm" rows="2">{{ old('alamat_lengkap', $pegawai->alamat_lengkap ?? '') }}</textarea>
                        </div>

                        <div class="{{ $col }}">
                            <label>Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" class="form-control form-control-sm"
                                value="{{ old('nomor_telepon', $pegawai->nomor_telepon ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control form-control-sm"
                                value="{{ old('email', $pegawai->email ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Status Kepegawaian</label>
                            <input type="text" name="status_kepegawaian" class="form-control form-control-sm"
                                value="{{ old('status_kepegawaian', $pegawai->status_kepegawaian ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Jabatan Terakhir</label>
                            <input type="text" name="jabatan_terakhir" class="form-control form-control-sm"
                                value="{{ old('jabatan_terakhir', $pegawai->jabatan_terakhir ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Unit Kerja</label>
                            <input type="text" name="unit_kerja" class="form-control form-control-sm"
                                value="{{ old('unit_kerja', $pegawai->unit_kerja ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>TMT</label>
                            <input type="date" name="tmt" class="form-control form-control-sm"
                                value="{{ old('tmt', $pegawai->tmt ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Golongan / Pangkat</label>
                            <input type="text" name="golongan_pangkat" class="form-control form-control-sm"
                                value="{{ old('golongan_pangkat', $pegawai->golongan_pangkat ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Nomor SK</label>
                            <input type="text" name="nomor_sk_pengangkatan" class="form-control form-control-sm"
                                value="{{ old('nomor_sk_pengangkatan', $pegawai->nomor_sk_pengangkatan ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal SK</label>
                            <input type="date" name="tanggal_sk" class="form-control form-control-sm"
                                value="{{ old('tanggal_sk', $pegawai->tanggal_sk ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Instansi Pengangkat</label>
                            <input type="text" name="instansi_pengangkat" class="form-control form-control-sm"
                                value="{{ old('instansi_pengangkat', $pegawai->instansi_pengangkat ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Riwayat Sekolah / Instansi Sebelumnya</label>
                            <input type="text" name="riwayat_sekolah_instansi_sebelumnya" class="form-control form-control-sm"
                                value="{{ old('riwayat_sekolah_instansi_sebelumnya', $pegawai->riwayat_sekolah_instansi_sebelumnya ?? '') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Riwayat Penugasan Tambahan</label>
                            <input type="text" name="riwayat_penugasan_tambahan" class="form-control form-control-sm"
                                value="{{ old('riwayat_penugasan_tambahan', $pegawai->riwayat_penugasan_tambahan ?? '') }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" class="form-control form-control-sm"
                                value="{{ old('pendidikan_terakhir', $pegawai->pendidikan_terakhir ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Nama Lembaga Pendidikan</label>
                            <input type="text" name="nama_lembaga_pendidikan" class="form-control form-control-sm"
                                value="{{ old('nama_lembaga_pendidikan', $pegawai->nama_lembaga_pendidikan ?? '') }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" class="form-control form-control-sm"
                                value="{{ old('jurusan', $pegawai->jurusan ?? '') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label>Upload Dokumen (PDF)</label>
                            <input type="file" name="file_dokumen_pdf" class="form-control form-control-sm">
                        </div>

                        <div class="col-md-6 d-flex align-items-end">
                            @if ($pegawai->file_dokumen_pdf)
                                <a href="{{ Storage::url($pegawai->file_dokumen_pdf) }}" target="_blank"
                                   class="btn btn-sm btn-info mt-3">
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
