<?php

namespace App\Http\Controllers\Admin;

use App\Models\SuratMasukKeluar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class SuratMasukKeluarController extends Controller
{
    public function index()
    {
        $surat = SuratMasukKeluar::latest()->get();
        return view('pages.admin.surat.index', compact('surat'));
    }

    public function create()
    {
        return view('pages.admin.surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|string', // masuk / keluar
            'nomor_agenda' => 'nullable|string',
            'tanggal_diterima' => 'nullable|date',
            'nomor_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'pengirim_surat' => 'required|string',
            'perihal' => 'required|string',
            'isi_ringkasan' => 'nullable|string',
            'tujuan_surat' => 'required|string',
            'sifat_surat' => 'nullable|string',
            'media_surat' => 'nullable|string',
            'disposisi' => 'nullable|string',
            'keterangan_tambahan' => 'nullable|string',
            'file_dokumen' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->only([
            'jenis_surat', 'nomor_agenda', 'tanggal_diterima', 'nomor_surat',
            'tanggal_surat', 'pengirim_surat', 'perihal', 'isi_ringkasan',
            'tujuan_surat', 'sifat_surat', 'media_surat', 'disposisi',
            'keterangan_tambahan',
        ]);

        if ($request->hasFile('file_dokumen')) {
            $data['file_dokumen'] = $request->file('file_dokumen')->store('dokumen_surat', 'public');
        }

        SuratMasukKeluar::create($data);

        toast('Data surat berhasil ditambahkan', 'success');
        return redirect()->route('surat-masuk-keluar.index');
    }

    public function show(string $id)
    {
        $surat = SuratMasukKeluar::findOrFail($id);
        return view('pages.admin.surat.show', compact('surat'));
    }

    public function edit(string $id)
    {
        $surat = SuratMasukKeluar::findOrFail($id);
        return view('pages.admin.surat.edit', compact('surat'));
    }

    public function update(Request $request, string $id)
    {
        $surat = SuratMasukKeluar::findOrFail($id);

        $request->validate([
            'jenis_surat' => 'required|string',
            'nomor_agenda' => 'nullable|string',
            'tanggal_diterima' => 'nullable|date',
            'nomor_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'pengirim_surat' => 'required|string',
            'perihal' => 'required|string',
            'isi_ringkasan' => 'nullable|string',
            'tujuan_surat' => 'required|string',
            'sifat_surat' => 'nullable|string',
            'media_surat' => 'nullable|string',
            'disposisi' => 'nullable|string',
            'keterangan_tambahan' => 'nullable|string',
            'file_dokumen' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->only([
            'jenis_surat', 'nomor_agenda', 'tanggal_diterima', 'nomor_surat',
            'tanggal_surat', 'pengirim_surat', 'perihal', 'isi_ringkasan',
            'tujuan_surat', 'sifat_surat', 'media_surat', 'disposisi',
            'keterangan_tambahan',
        ]);

        if ($request->hasFile('file_dokumen')) {
            if ($surat->file_dokumen && Storage::exists('public/' . $surat->file_dokumen)) {
                Storage::delete('public/' . $surat->file_dokumen);
            }
            $data['file_dokumen'] = $request->file('file_dokumen')->store('dokumen_surat', 'public');
        }

        $surat->update($data);

        toast('Data surat berhasil diperbarui', 'success');
        return redirect()->route('surat-masuk-keluar.index');
    }

    public function destroy(string $id)
    {
        $surat = SuratMasukKeluar::findOrFail($id);

        if ($surat->file_dokumen && Storage::exists('public/' . $surat->file_dokumen)) {
            Storage::delete('public/' . $surat->file_dokumen);
        }

        $surat->delete();

        toast('Data surat berhasil dihapus', 'success');
        return redirect()->route('surat-masuk-keluar.index');
    }
}
