@extends('layouts.template_default')
@section('title', 'Edit Data Soal')
@section('soal', 'active')
@section('content')
<div class="content-wrapper small">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header py-2">
                <h5 class="text-center m-0">Form Edit Data Soal</h5>
            </div>
            <form action="{{ route('soal.update', $soal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body px-3 py-2">
                    <div class="row g-2">
                        @php $col = 'col-12 col-md-4 form-group'; @endphp

                        <div class="{{ $col }}">
                            <label>Nama Mata Pelajaran</label>
                            <input type="text" name="nama_mapel" class="form-control form-control-sm"
                                value="{{ old('nama_mapel', $soal->nama_mapel) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Jenjang Kelas</label>
                            <input type="text" name="jenjang_kelas" class="form-control form-control-sm"
                                value="{{ old('jenjang_kelas', $soal->jenjang_kelas) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Semester / Tahun Ajaran</label>
                            <input type="text" name="semester" class="form-control form-control-sm"
                                value="{{ old('semester', $soal->semester) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Jenis Soal</label>
                            <input type="text" name="jenis_soal" class="form-control form-control-sm"
                                value="{{ old('jenis_soal', $soal->jenis_soal) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tanggal Pembuatan</label>
                            <input type="date" name="tanggal_pembuatan" class="form-control form-control-sm"
                                value="{{ old('tanggal_pembuatan', $soal->tanggal_pembuatan) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Nama Guru Pembuat Soal</label>
                            <input type="text" name="nama_guru" class="form-control form-control-sm"
                                value="{{ old('nama_guru', $soal->nama_guru) }}" required>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tujuan Pembelajaran</label>
                            <textarea name="tujuan_pembelajaran" class="form-control form-control-sm">{{ old('tujuan_pembelajaran', $soal->tujuan_pembelajaran) }}</textarea>
                        </div>

                        <div class="{{ $col }}">
                            <label>Tingkat Kesulitan Soal</label>
                            <select name="tingkat_kesulitan" class="form-control form-control-sm">
                                <option value="">-- Pilih Tingkat --</option>
                                <option value="Mudah" {{ $soal->tingkat_kesulitan == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                                <option value="Sedang" {{ $soal->tingkat_kesulitan == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="Sulit" {{ $soal->tingkat_kesulitan == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                            </select>
                        </div>

                        <div class="{{ $col }}">
                            <label>Format Soal</label>
                            <input type="text" name="format_soal" class="form-control form-control-sm"
                                value="{{ old('format_soal', $soal->format_soal) }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Jumlah Soal</label>
                            <input type="number" name="jumlah_soal" class="form-control form-control-sm"
                                value="{{ old('jumlah_soal', $soal->jumlah_soal) }}">
                        </div>

                        <div class="{{ $col }}">
                            <label>Keterangan Tambahan</label>
                            <textarea name="keterangan_tambahan" class="form-control form-control-sm">{{ old('keterangan_tambahan', $soal->keterangan_tambahan) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Upload Dokumen Baru (Opsional)</label>
                            <div class="form-group">
                                <label>File Soal</label>
                                <input type="file" name="file_soal" class="form-control form-control-sm" accept="application/pdf">
                            </div>
                            <div class="form-group">
                                <label>Kunci Jawaban</label>
                                <input type="file" name="kunci_jawaban" class="form-control form-control-sm" accept="application/pdf">
                            </div>
                            <div class="form-group">
                                <label>Rubrik Penilaian</label>
                                <input type="file" name="rubrik_penilaian" class="form-control form-control-sm" accept="application/pdf">
                            </div>
                            <div class="form-group">
                                <label>Pedoman Penskoran</label>
                                <input type="file" name="pedoman_penskoran" class="form-control form-control-sm" accept="application/pdf">
                            </div>
                        </div>

                        <div class="col-md-6 d-flex flex-column">
                            @foreach ([
                                'file_soal' => 'File Soal',
                                'kunci_jawaban' => 'Kunci Jawaban',
                                'rubrik_penilaian' => 'Rubrik Penilaian',
                                'pedoman_penskoran' => 'Pedoman Penskoran'
                            ] as $field => $label)
                                @if ($soal->$field)
                                    <a href="{{ Storage::url($soal->$field) }}" target="_blank" class="btn btn-sm btn-outline-info mb-2">
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
