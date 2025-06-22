@extends('layouts.template_default')
@section('title', 'Edit Data Siswa')
@section('siswa', 'active')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Edit Data Siswa</h5>
            </div>
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body small">
                    <div class="row g-2">
                        @php $col = 'col-md-4 form-group'; @endphp

                        {{-- A. Identitas Siswa --}}
                        <div class="{{ $col }}">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-sm" value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control form-control-sm" value="{{ old('nis', $siswa->nis) }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control form-control-sm" value="{{ old('nisn', $siswa->nisn) }}">
                        </div>
                        <div class="{{ $col }}">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control form-control-sm" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control form-control-sm" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control form-control-sm" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="{{ $col }}">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control form-control-sm" value="{{ old('agama', $siswa->agama) }}" required>
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" class="form-control form-control-sm">{{ old('alamat_lengkap', $siswa->alamat_lengkap) }}</textarea>
                        </div>
                        <div class="{{ $col }}">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control form-control-sm" value="{{ old('no_hp', $siswa->no_hp) }}">
                        </div>

                        {{-- B. Data Orang Tua --}}
                        <div class="{{ $col }}">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control form-control-sm" value="{{ old('nama_ayah', $siswa->nama_ayah) }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control form-control-sm" value="{{ old('nama_ibu', $siswa->nama_ibu) }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Pekerjaan Orang Tua</label>
                            <input type="text" name="pekerjaan_ortu" class="form-control form-control-sm" value="{{ old('pekerjaan_ortu', $siswa->pekerjaan_ortu) }}">
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Alamat Orang Tua</label>
                            <textarea name="alamat_ortu" class="form-control form-control-sm">{{ old('alamat_ortu', $siswa->alamat_ortu) }}</textarea>
                        </div>
                        <div class="{{ $col }}">
                            <label>No HP Orang Tua</label>
                            <input type="text" name="no_hp_ortu" class="form-control form-control-sm" value="{{ old('no_hp_ortu', $siswa->no_hp_ortu) }}">
                        </div>

                        {{-- C. Data Akademik --}}
                        <div class="{{ $col }}">
                            <label>Kelas Sekarang</label>
                            <input type="text" name="kelas_sekarang" class="form-control form-control-sm" value="{{ old('kelas_sekarang', $siswa->kelas_sekarang) }}" required>
                        </div>
                        <div class="{{ $col }}">
                            <label>Tahun Masuk</label>
                            <input type="number" name="tahun_masuk" class="form-control form-control-sm" value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}" required>
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Riwayat Kenaikan Kelas</label>
                            <textarea name="riwayat_kenaikan_kelas" class="form-control form-control-sm">{{ old('riwayat_kenaikan_kelas', $siswa->riwayat_kenaikan_kelas) }}</textarea>
                        </div>

                        {{-- D. Upload Dokumen --}}
                        <div class="col-md-6">
                            <label>Upload Dokumen Baru (Opsional)</label>
                            @foreach([
                                'akta_kelahiran' => 'Akta Kelahiran',
                                'kartu_keluarga' => 'Kartu Keluarga',
                                'foto' => 'Foto',
                                'nilai_rapor' => 'Nilai Rapor',
                                'surat_mutasi' => 'Surat Mutasi',
                            ] as $field => $label)
                                <div class="form-group">
                                    <label>{{ $label }}</label>
                                    <input type="file" name="{{ $field }}" class="form-control form-control-sm" accept="application/pdf,image/*">
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-6 d-flex flex-column">
                            @foreach([
                                'akta_kelahiran' => 'Akta Kelahiran',
                                'kartu_keluarga' => 'Kartu Keluarga',
                                'foto' => 'Foto',
                                'nilai_rapor' => 'Nilai Rapor',
                                'surat_mutasi' => 'Surat Mutasi',
                            ] as $field => $label)
                                @if ($siswa->$field)
                                    <a href="{{ Storage::url($siswa->$field) }}" target="_blank" class="btn btn-outline-primary btn-sm mb-2">
                                        <i class="fa fa-file"></i> Lihat {{ $label }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="card-footer text-end py-2">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
