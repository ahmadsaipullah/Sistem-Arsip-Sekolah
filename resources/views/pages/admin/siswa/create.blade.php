@extends('layouts.template_default')
@section('title', 'Tambah Data Siswa')
@section('siswa', 'active')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Tambah Data Siswa</h5>
            </div>
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body small">
                    <div class="row g-2">
                        @php $col = 'col-md-4 form-group'; @endphp

                        {{-- A. Data Identitas Siswa --}}
                        <div class="{{ $col }}">
                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-sm" value="{{ old('nama_lengkap') }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>NIS <span class="text-danger">*</span></label>
                            <input type="text" name="nis" class="form-control form-control-sm" value="{{ old('nis') }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control form-control-sm" value="{{ old('nisn') }}">
                        </div>
                        <div class="{{ $col }}">
                            <label>Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text" name="tempat_lahir" class="form-control form-control-sm" value="{{ old('tempat_lahir') }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_lahir" class="form-control form-control-sm" value="{{ old('tanggal_lahir') }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-control form-control-sm" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="{{ $col }}">
                            <label>Agama <span class="text-danger">*</span></label>
                            <input type="text" name="agama" class="form-control form-control-sm" value="{{ old('agama') }}" required>
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat_lengkap" class="form-control form-control-sm" required>{{ old('alamat_lengkap') }}</textarea>
                        </div>
                        <div class="{{ $col }}">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control form-control-sm" value="{{ old('no_hp') }}">
                        </div>

                        {{-- B. Data Orang Tua --}}
                        <div class="{{ $col }}">
                            <label>Nama Ayah <span class="text-danger">*</span></label>
                            <input type="text" name="nama_ayah" class="form-control form-control-sm" value="{{ old('nama_ayah') }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Nama Ibu <span class="text-danger">*</span></label>
                            <input type="text" name="nama_ibu" class="form-control form-control-sm" value="{{ old('nama_ibu') }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Pekerjaan Orang Tua</label>
                            <input type="text" name="pekerjaan_ortu" class="form-control form-control-sm" value="{{ old('pekerjaan_ortu') }}">
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Alamat Orang Tua</label>
                            <textarea name="alamat_ortu" class="form-control form-control-sm">{{ old('alamat_ortu') }}</textarea>
                        </div>
                        <div class="{{ $col }}">
                            <label>No HP Orang Tua</label>
                            <input type="text" name="no_hp_ortu" class="form-control form-control-sm" value="{{ old('no_hp_ortu') }}">
                        </div>

                        {{-- C. Data Akademik --}}
                        <div class="{{ $col }}">
                            <label>Kelas Sekarang <span class="text-danger">*</span></label>
                            <input type="text" name="kelas_sekarang" class="form-control form-control-sm" value="{{ old('kelas_sekarang') }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Tahun Masuk <span class="text-danger">*</span></label>
                            <input type="number" name="tahun_masuk" class="form-control form-control-sm" value="{{ old('tahun_masuk') }}" required>
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Riwayat Kenaikan Kelas</label>
                            <textarea name="riwayat_kenaikan_kelas" class="form-control form-control-sm">{{ old('riwayat_kenaikan_kelas') }}</textarea>
                        </div>

                        {{-- D. Upload Dokumen --}}
                        <div class="col-md-12">
                            <label>Upload Dokumen (Opsional)</label>
                            <div class="row">
                                @foreach([
                                    'akta_kelahiran' => 'Akta Kelahiran',
                                    'kartu_keluarga' => 'Kartu Keluarga',
                                    'foto' => 'Foto',
                                    'nilai_rapor' => 'Nilai Rapor',
                                    'surat_mutasi' => 'Surat Mutasi'
                                ] as $name => $label)
                                    <div class="col-md-6 form-group">
                                        <label>{{ $label }}</label>
                                        <input type="file" name="{{ $name }}" class="form-control form-control-sm" accept="application/pdf,image/*">
                                    </div>
                                @endforeach
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
