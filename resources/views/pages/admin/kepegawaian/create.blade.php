@extends('layouts.template_default')
@section('title', 'Tambah Data Kepegawaian')
@section('kepegawaian','active')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid mt-4">
            <div class="card card-primary">
                <div class="card-header py-2">
                    <h5 class="text-center m-0">Form Tambah Data Kepegawaian</h5>
                </div>
                <form action="{{ route('data-kepegawaian.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body small">
                        <div class="row g-2">
                            @php $col = 'col-md-4 form-group'; @endphp

                            <div class="{{ $col }}">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control form-control-sm"
                                    value="{{ old('nama_lengkap') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>NIP / NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nip_nik" class="form-control form-control-sm"
                                    value="{{ old('nip_nik') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir" class="form-control form-control-sm"
                                    value="{{ old('tempat_lahir') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" class="form-control form-control-sm"
                                    value="{{ old('tanggal_lahir') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-control form-control-sm" required>
                                    <option disabled selected>--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <div class="{{ $col }}">
                                <label>Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat_lengkap" class="form-control form-control-sm" required>{{ old('alamat_lengkap') }}</textarea>
                            </div>

                            <div class="{{ $col }}">
                                <label>Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="text" name="nomor_telepon" class="form-control form-control-sm"
                                    value="{{ old('nomor_telepon') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control form-control-sm"
                                    value="{{ old('email') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Status Kepegawaian <span class="text-danger">*</span></label>
                                <select name="status_kepegawaian" class="form-control form-control-sm" required>
                                    <option disabled selected>--Pilih Status Kepegawaian--</option>
                                    <option value="PNS" {{ old('status_kepegawaian') == 'PNS' ? 'selected' : '' }}>PNS
                                    </option>
                                    <option value="PPPK" {{ old('status_kepegawaian') == 'PPPK' ? 'selected' : '' }}>PPPK
                                    </option>
                                    <option value="HONORER" {{ old('status_kepegawaian') == 'HONORER' ? 'selected' : '' }}>
                                        HONORER</option>
                                    <option value="KONTRAK" {{ old('status_kepegawaian') == 'KONTRAK' ? 'selected' : '' }}>
                                        KONTRAK</option>
                                </select>
                            </div>

                            <div class="{{ $col }}">
                                <label>Jabatan Terakhir <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan_terakhir" class="form-control form-control-sm"
                                    value="{{ old('jabatan_terakhir') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Unit Kerja <span class="text-danger">*</span></label>
                                <input type="text" name="unit_kerja" class="form-control form-control-sm"
                                    value="{{ old('unit_kerja') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>TMT <span class="text-danger">*</span></label>
                                <input type="date" name="tmt" class="form-control form-control-sm"
                                    value="{{ old('tmt') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Golongan / Pangkat <span class="text-danger">*</span></label>
                                <input type="text" name="golongan_pangkat" class="form-control form-control-sm"
                                    value="{{ old('golongan_pangkat') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Nomor SK <span class="text-danger">*</span></label>
                                <input type="text" name="nomor_sk_pengangkatan" class="form-control form-control-sm"
                                    value="{{ old('nomor_sk_pengangkatan') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Tanggal SK <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_sk" class="form-control form-control-sm"
                                    value="{{ old('tanggal_sk') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Instansi Pengangkat <span class="text-danger">*</span></label>
                                <input type="text" name="instansi_pengangkat" class="form-control form-control-sm"
                                    value="{{ old('instansi_pengangkat') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Riwayat Sekolah / Instansi Sebelumnya</label>
                                <input type="text" name="riwayat_sekolah_instansi_sebelumnya"
                                    class="form-control form-control-sm"
                                    value="{{ old('riwayat_sekolah_instansi_sebelumnya') }}">
                            </div>

                            <div class="{{ $col }}">
                                <label>Riwayat Penugasan Tambahan</label>
                                <input type="text" name="riwayat_penugasan_tambahan"
                                    class="form-control form-control-sm" value="{{ old('riwayat_penugasan_tambahan') }}">
                            </div>

                            <div class="{{ $col }}">
                                <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <input type="text" name="pendidikan_terakhir" class="form-control form-control-sm"
                                    value="{{ old('pendidikan_terakhir') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Nama Lembaga Pendidikan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lembaga_pendidikan" class="form-control form-control-sm"
                                    value="{{ old('nama_lembaga_pendidikan') }}" required>
                            </div>

                            <div class="{{ $col }}">
                                <label>Jurusan <span class="text-danger">*</span></label>
                                <input type="text" name="jurusan" class="form-control form-control-sm"
                                    value="{{ old('jurusan') }}" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Upload Dokumen (PDF)</label>
                           <input type="file" name="file_dokumen_pdf" class="form-control form-control-sm" accept="application/pdf">
                                <small class="text-muted d-block mt-2">* Dokumen yang perlu digabungkan dalam 1 file
                                    PDF:</small>
                                <ul class="text-muted small mt-1"
                                    style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.3rem 1rem; padding-left: 1rem;">
                                    <li>KTP</li>
                                    <li>KK</li>
                                    <li>Akte</li>
                                    <li>Buku Nikah</li>
                                    <li>Ijazah (SD, SMP, SMA, S1)</li>
                                    <li>No Rekening</li>
                                    <li>SK CPNS</li>
                                    <li>SK PNS</li>
                                    <li>Surat Tanda Tamat Pelatihan / Pra Jabatan</li>
                                    <li>Sumpah Jabatan</li>
                                    <li>SK Pangkat Golongan (3a, 3b, 3c, 3d, 4a, 4b)</li>
                                    <li>Penetapan Angka Kredit / PAK (3a, 3b, 3c, 3d, 4a, 4b)</li>
                                    <li>Jabatan Fungsional dari 3d ke 4a</li>
                                    <li>Kenaikan Gaji Berkala</li>
                                    <li>Sertifikat-Sertifikat Pendidikan (Seminar)</li>
                                    <li>Data Penilaian Pegawai</li>
                                    <li>SKP / PKG</li>
                                    <li>Piagam-Piagam Pelatihan</li>
                                    <li>Surat Keterangan Belajar Anak</li>
                                    <li>Kartu-Kartu Keanggotaan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right py-2">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
