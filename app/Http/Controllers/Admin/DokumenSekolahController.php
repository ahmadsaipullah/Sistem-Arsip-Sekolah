<?php

namespace App\Http\Controllers\Admin;

use App\Models\DokumenSekolah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class DokumenSekolahController extends Controller
{
    public function index()
    {
        $dokumen = DokumenSekolah::latest()->first(); // hanya satu dokumen (opsional)
        return view('pages.admin.dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('pages.admin.dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profil_sekolah' => 'nullable|mimes:pdf|max:20480',
            'struktur_organisasi' => 'nullable|mimes:pdf|max:20480',
            'program_kerja_tahunan' => 'nullable|mimes:pdf|max:20480',
            'kalender_pendidikan' => 'nullable|mimes:pdf|max:20480',
            'laporan_kegiatan' => 'nullable|mimes:pdf|max:20480',
            'dokumen_akreditasi' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = [];

        foreach ([
            'profil_sekolah',
            'struktur_organisasi',
            'program_kerja_tahunan',
            'kalender_pendidikan',
            'laporan_kegiatan',
            'dokumen_akreditasi',
        ] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('dokumen_sekolah', 'public');
            }
        }

        DokumenSekolah::create($data);

        toast('Dokumen sekolah berhasil disimpan', 'success');
        return redirect()->route('dokumen-sekolah.index');
    }

    public function show($id)
    {
        $dokumen = DokumenSekolah::findOrFail($id);
        return view('pages.admin.dokumen.show', compact('dokumen'));
    }

    public function edit($id)
    {
        $dokumen = DokumenSekolah::findOrFail($id);
        return view('pages.admin.dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, $id)
    {
        $dokumen = DokumenSekolah::findOrFail($id);

        $request->validate([
            'profil_sekolah' => 'nullable|mimes:pdf|max:20480',
            'struktur_organisasi' => 'nullable|mimes:pdf|max:20480',
            'program_kerja_tahunan' => 'nullable|mimes:pdf|max:20480',
            'kalender_pendidikan' => 'nullable|mimes:pdf|max:20480',
            'laporan_kegiatan' => 'nullable|mimes:pdf|max:20480',
            'dokumen_akreditasi' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = [];

        foreach ([
            'profil_sekolah',
            'struktur_organisasi',
            'program_kerja_tahunan',
            'kalender_pendidikan',
            'laporan_kegiatan',
            'dokumen_akreditasi',
        ] as $file) {
            if ($request->hasFile($file)) {
                // hapus file lama
                if ($dokumen->$file && Storage::disk('public')->exists($dokumen->$file)) {
                    Storage::disk('public')->delete($dokumen->$file);
                }
                $data[$file] = $request->file($file)->store('dokumen_sekolah', 'public');
            }
        }

        $dokumen->update($data);

        toast('Dokumen sekolah berhasil diperbarui', 'success');
        return redirect()->route('dokumen-sekolah.index');
    }

    public function destroy($id)
    {
        $dokumen = DokumenSekolah::findOrFail($id);

        foreach ([
            'profil_sekolah',
            'struktur_organisasi',
            'program_kerja_tahunan',
            'kalender_pendidikan',
            'laporan_kegiatan',
            'dokumen_akreditasi',
        ] as $file) {
            if ($dokumen->$file && Storage::disk('public')->exists($dokumen->$file)) {
                Storage::disk('public')->delete($dokumen->$file);
            }
        }

        $dokumen->delete();

        toast('Dokumen sekolah berhasil dihapus', 'success');
        return redirect()->route('dokumen-sekolah.index');
    }
}
