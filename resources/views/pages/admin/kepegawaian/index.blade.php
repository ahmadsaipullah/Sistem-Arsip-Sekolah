@extends('layouts.template_default')
@section('title', 'Data Kepegawaian')
@section('kepegawaian','active')
@section('content')
<div class="content-wrapper small">
    @include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Data Kepegawaian</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right small">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Kepegawaian</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header py-2">
                    <a class="btn btn-sm btn-primary" href="{{ route('data-kepegawaian.create') }}">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIP/NIK</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Pendidikan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawai as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->nip_nik }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->nomor_telepon }}</td>
                                        <td>{{ $item->jabatan_terakhir }}</td>
                                        <td>{{ $item->unit_kerja }}</td>
                                        <td>{{ $item->pendidikan_terakhir }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('data-kepegawaian.show', $item->id) }}" class="btn btn-xs btn-info mb-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('data-kepegawaian.edit', $item->id) }}" class="btn btn-xs btn-warning mb-1">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('data-kepegawaian.destroy', $item->id) }}" method="POST" class="d-inline">
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
                                        <td colspan="9" class="text-center">Tidak ada data</td>
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
