@extends('layouts.template_default')
@section('title', 'Create Admin')
@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Create Admin</h3>
            </div>

            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" placeholder="Name" value="{{ old('name') }}" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                       id="nip" name="nip" placeholder="NIP" value="{{ old('nip') }}" required />
                                @error('nip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                       id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') }}" required />
                                @error('no_hp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                       id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}" required />
                                @error('jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" placeholder="Password" required />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="level_id">Level User</label>
                                <select class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                                    <option disabled selected>-- Pilih Level User --</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
