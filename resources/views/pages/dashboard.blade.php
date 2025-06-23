@extends('layouts.template_default')
@section('title', 'Sistem Pengarsipan Dokumen')
@section('dashboard', 'active')
@section('content')

<div class="content-wrapper">
    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="m-0">📂 Sistem Pengarsipan Dokumen</h1>
                    <p class="text-muted">
                        Selamat datang <strong>{{ auth()->user()->name }}</strong> di Sistem Arsip <strong>SMP Negeri 2</strong>
                    </p>
                </div>
                <div class="col-md-4 text-md-right text-center mt-3 mt-md-0">
                    <div>
                        <small class="text-muted d-block mb-1">🗓️ Hari/Tanggal:</small>
                        <span id="tanggal" class="badge badge-info p-2 mb-1">--</span>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted d-block">⏰ Waktu:</small>
                        <span id="jam" class="badge badge-success p-2">--</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @if (auth()->user()->level_id == 1)
     <section class="content">
        <div class="container-fluid">
                <div class="row">
                    <!-- Total Pengguna -->
                    <div class="col-md-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-users fa-3x text-primary mr-3"></i>
                                <div>
                                    <h5 class="text-primary font-weight-bold mb-0">Total Pengguna</h5>
                                    <small>{{ $user }} User</small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@else
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
                <div class="row">
                    <!-- Total Pengguna -->
                    {{-- <div class="col-md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-users fa-3x text-primary mr-3"></i>
                                <div>
                                    <h5 class="text-primary font-weight-bold mb-0">Total Pengguna</h5>
                                    <small>{{ $user }} User</small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Data Kepegawaian -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-id-badge fa-3x text-info mr-3"></i>
                                <div>
                                    <h5 class="text-info font-weight-bold mb-0">Data Kepegawaian</h5>
                                    <small>Total: {{ $kepegawaian }}</small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('data-kepegawaian.index') }}" class="btn btn-sm btn-outline-info">Lihat</a>
                            </div>
                        </div>
                    </div>

                    <!-- Dokumen Sekolah -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-archive fa-3x text-secondary mr-3"></i>
                                <div>
                                    <h5 class="text-secondary font-weight-bold mb-0">Dokumen Sekolah</h5>
                                    <small>Total: {{ $dokumen }}</small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('dokumen-sekolah.index') }}" class="btn btn-sm btn-outline-secondary">Lihat</a>
                            </div>
                        </div>
                    </div>

                    <!-- Soal -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-file-alt fa-3x text-warning mr-3"></i>
                                <div>
                                    <h5 class="text-warning font-weight-bold mb-0">Data Soal</h5>
                                    <small>Total: {{ $soal }}</small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('soal.index') }}" class="btn btn-sm btn-outline-warning">Lihat</a>
                            </div>
                        </div>
                    </div>

                    <!-- Siswa -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-user-graduate fa-3x text-success mr-3"></i>
                                <div>
                                    <h5 class="text-success font-weight-bold mb-0">Data Siswa</h5>
                                    <small>Total: {{ $siswa }}</small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-outline-success">Lihat</a>
                            </div>
                        </div>
                    </div>

                    <!-- Surat -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-envelope-open-text fa-3x text-dark mr-3"></i>
                                <div>
                                    <h5 class="text-dark font-weight-bold mb-0">Surat Masuk/Keluar</h5>
                                    <small>Total: {{ $surat }}</small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('surat-masuk-keluar.index') }}" class="btn btn-sm btn-outline-dark">Lihat</a>
                            </div>
                        </div>
                    </div>

                </div>

        </div>
    </section>
    @endif
</div>

<script>
    function updateTime() {
        const now = new Date();
        const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');

        const tanggal = now.getDate();
        const bulanNama = bulan[now.getMonth()];
        const tahun = now.getFullYear();
        const hariNama = hari[now.getDay()];

        document.getElementById('jam').textContent = `${jam}:${menit}:${detik}`;
        document.getElementById('tanggal').textContent = `${hariNama}, ${tanggal} ${bulanNama} ${tahun}`;
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateTime();
        setInterval(updateTime, 1000);
    });
</script>

@endsection
