@extends('layouts.template_default')
@section('title', 'Update Admin')
@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Update Admin</h3>
            </div>

            <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Name" value="{{ old('name') ?? $admin->name }}" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                    id="nip" name="nip" placeholder="NIP" value="{{ old('nip') ?? $admin->nip }}" required />
                                @error('nip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') ?? $admin->no_hp }}" required />
                                @error('no_hp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Email" value="{{ old('email') ?? $admin->email }}" required />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password" value="{{ old('password') ?? $admin->password }}" required />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="level_id">Level User</label>
                                <select class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                                    <option value="{{ $admin->level_id }}">{{ $admin->level->level }}</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') ?? $admin->jabatan }}" required />
                                @error('jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label><br>
                                @if ($admin->image)
                                    <img src="{{ Storage::url($admin->image) }}" alt="gambar"
                                        class="img-fluid rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img alt="image" class="img-fluid rounded-circle mb-2"
                                        src="{{ asset('assets/img/user_default.png') }}" style="width: 100px; height: 100px;">
                                @endif
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
