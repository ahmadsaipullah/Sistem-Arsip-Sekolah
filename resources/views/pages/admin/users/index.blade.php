@extends('layouts.template_default')
@section('title', 'Halaman Admin')
@section('admin','active')

@section('content')
<div class="content-wrapper">
    @include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Data Kepegawaian</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right small">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Kepegawaian</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.create') }}">
                        <i class="fa fa-plus"></i> Tambah Admin
                    </a>
                </div>
                <div class="card-body table-responsive-sm">
                    <table class="table table-sm table-bordered table-striped table-hover text-nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Role</th>
                                <th class="d-none d-sm-table-cell">Jabatan</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->nip }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->no_hp }}</td>
                                    <td>{{ $admin->Level->level }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $admin->jabatan }}</td>
                                    <td class="text-center">
                                        <img src="{{ $admin->image ? Storage::url($admin->image) : asset('assets/img/user_default.png') }}"
                                             class="img-fluid rounded-circle img-thumbnail"
                                             style="max-width: 60px; height: auto;" alt="foto">
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-wrap justify-content-center">
                                            <a href="{{ route('admin.edit', $admin->id) }}"
                                               class="btn btn-warning btn-sm m-1">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm m-1 delete_confirm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center p-5">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
