@extends('layouts.template_default')
@section('title', 'Data Soal')
@section('soal','active')
@section('content')
<div class="content-wrapper small">
    @include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Data Soal</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right small">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Soal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header py-2">
                    <a class="btn btn-sm btn-primary" href="{{ route('soal.create') }}">
                        <i class="fa fa-plus"></i> Tambah Soal
                    </a>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Mapel</th>
                                    <th>Kelas</th>
                                    <th>Semester</th>
                                    <th>Jenis Soal</th>
                                    <th>Guru Pembuat</th>
                                    <th>Tanggal</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($soals as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_mapel }}</td>
                                        <td class="text-center">{{ $item->jenjang_kelas }}</td>
                                        <td class="text-center">{{ $item->semester }}</td>
                                        <td class="text-center">{{ $item->jenis_soal }}</td>
                                        <td>{{ $item->nama_guru }}</td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($item->tanggal_pembuatan)->format('d-m-Y') }}
                                        </td>
                                        <td class="text-center">
                                            @if ($item->file_soal)
                                                <a href="{{ Storage::url($item->file_soal) }}" target="_blank" class="btn btn-xs btn-success mb-1">
                                                    <i class="fa fa-file-pdf"></i> Soal
                                                </a>
                                            @endif
                                            @if ($item->kunci_jawaban)
                                                <a href="{{ Storage::url($item->kunci_jawaban) }}" target="_blank" class="btn btn-xs btn-info mb-1">
                                                    <i class="fa fa-file-alt"></i> Kunci
                                                </a>
                                            @endif
                                            @if ($item->rubrik_penilaian)
                                                <a href="{{ Storage::url($item->rubrik_penilaian) }}" target="_blank" class="btn btn-xs btn-warning mb-1">
                                                    <i class="fa fa-ruler"></i> Rubrik
                                                </a>
                                            @endif
                                            @if ($item->pedoman_penskoran)
                                                <a href="{{ Storage::url($item->pedoman_penskoran) }}" target="_blank" class="btn btn-xs btn-secondary mb-1">
                                                    <i class="fa fa-book"></i> Penskoran
                                                </a>
                                            @endif
                                            @unless($item->file_soal || $item->kunci_jawaban || $item->rubrik_penilaian || $item->pedoman_penskoran)
                                                <span class="text-muted">-</span>
                                            @endunless
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('soal.show', $item->id) }}" class="btn btn-xs btn-info mb-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('soal.edit', $item->id) }}" class="btn btn-xs btn-warning mb-1">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('soal.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger mb-1" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data soal</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
