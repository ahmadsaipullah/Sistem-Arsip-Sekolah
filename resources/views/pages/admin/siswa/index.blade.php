@extends('layouts.template_default')
@section('title', 'Data Siswa')
@section('siswa','active')
@section('content')
<div class="content-wrapper small">
    @include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Data Siswa</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right small">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header py-2">
                    <a class="btn btn-sm btn-primary" href="{{ route('siswa.create') }}">
                        <i class="fa fa-plus"></i> Tambah Siswa
                    </a>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS / NISN</th>
                                    <th>TTL</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>No HP</th>
                                    <th>Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswas as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td class="text-center">{{ $item->nis }} / {{ $item->nisn }}</td>
                                        <td>{{ $item->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                        <td class="text-center">{{ ucfirst($item->jenis_kelamin) }}</td>
                                        <td class="text-center">{{ $item->kelas_sekarang }}</td>
                                        <td class="text-center">{{ $item->no_hp }}</td>
                                        <td class="text-center">
                                            @if ($item->akta_kelahiran)
                                                <a href="{{ Storage::url($item->akta_kelahiran) }}" class="btn btn-xs btn-success mb-1" target="_blank">
                                                    <i class="fa fa-file-pdf"></i> Akta
                                                </a>
                                            @endif
                                            @if ($item->kartu_keluarga)
                                                <a href="{{ Storage::url($item->kartu_keluarga) }}" class="btn btn-xs btn-info mb-1" target="_blank">
                                                    <i class="fa fa-file-pdf"></i> KK
                                                </a>
                                            @endif
                                            @if ($item->nilai_rapor)
                                                <a href="{{ Storage::url($item->nilai_rapor) }}" class="btn btn-xs btn-warning mb-1" target="_blank">
                                                    <i class="fa fa-file-pdf"></i> Rapor
                                                </a>
                                            @endif
                                            @if ($item->surat_mutasi)
                                                <a href="{{ Storage::url($item->surat_mutasi) }}" class="btn btn-xs btn-secondary mb-1" target="_blank">
                                                    <i class="fa fa-file-pdf"></i> Mutasi
                                                </a>
                                            @endif
                                            @unless($item->akta_kelahiran || $item->kartu_keluarga || $item->nilai_rapor || $item->surat_mutasi)
                                                <span class="text-muted">-</span>
                                            @endunless
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-xs btn-info mb-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-xs btn-warning mb-1">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline">
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
                                        <td colspan="9" class="text-center">Tidak ada data siswa</td>
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
