@extends('layouts.template_default')
@section('title', 'Data Surat Masuk & Keluar')
@section('surat','active')
@section('content')
<div class="content-wrapper small">
    @include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Data Surat Masuk & Keluar</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right small">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Surat</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header py-2">
                    <a class="btn btn-sm btn-primary" href="{{ route('surat-masuk-keluar.create') }}">
                        <i class="fa fa-plus"></i> Tambah Surat
                    </a>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped" id="Table">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Surat</th>
                                    <th>Nomor Agenda</th>
                                    <th>Nomor Surat</th>
                                    <th>Perihal</th>
                                    <th>Tujuan / Pengirim</th>
                                    <th>Tanggal Surat</th>
                                    {{-- <th>File</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($surat as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                       <td class="text-center">
    @if($item->jenis_surat === 'masuk')
        <span class="badge badge-success">Surat Masuk</span>
    @elseif($item->jenis_surat === 'keluar')
        <span class="badge badge-danger">Surat Keluar</span>
    @else
        <span class="badge badge-secondary">{{ ucfirst($item->jenis_surat) }}</span>
    @endif
</td>

                                        <td>{{ $item->nomor_agenda }}</td>
                                        <td>{{ $item->nomor_surat }}</td>
                                        <td>{{ $item->perihal }}</td>
                                        <td>
                                            @if($item->jenis_surat === 'masuk')
                                                {{ $item->pengirim_surat }}
                                            @elseif($item->jenis_surat === 'keluar')
                                                {{ $item->tujuan_surat }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->tanggal_surat ? \Carbon\Carbon::parse($item->tanggal_surat)->format('d-m-Y') : '-' }}
                                        </td>
                                        {{-- <td class="text-center">
                                            @if($item->file_dokumen)
                                                <a href="{{ Storage::url($item->file_dokumen) }}" target="_blank" class="btn btn-xs btn-success">
                                                    <i class="fa fa-file-pdf"></i> PDF
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td> --}}
                                        <td class="text-center">
                                            <a href="{{ route('surat-masuk-keluar.show', $item->id) }}" class="btn btn-xs btn-info mb-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                              {{-- Tombol Lihat Dokumen --}}

        <a href="{{ Storage::url($item->file_dokumen) }}" target="_blank" class="btn btn-xs btn-primary mb-1">
            <i class="fa fa-file-pdf"></i> Lihat
        </a>

        {{-- Tombol Download --}}
        <a href="{{ Storage::url($item->file_dokumen) }}" download class="btn btn-xs btn-success mb-1">
            <i class="fa fa-download"></i> Download Dokumen
        </a>
  <a href="#" onclick="printPDF('{{ asset('storage/' . $item->file_dokumen) }}')" class="btn btn-xs btn-secondary mb-1">
    <i class="fa fa-print"></i> Print
</a>

<script>
    function printPDF(pdfUrl) {
        const iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        iframe.src = pdfUrl;
        document.body.appendChild(iframe);

        iframe.onload = function () {
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        };
    }
</script>
                                                 @if (auth()->user()->level_id == 2)
                                            <a href="{{ route('surat-masuk-keluar.edit', $item->id) }}" class="btn btn-xs btn-warning mb-1">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('surat-masuk-keluar.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger mb-1" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data surat</td>
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
