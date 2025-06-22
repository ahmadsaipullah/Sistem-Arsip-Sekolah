<?php

namespace App\Http\Controllers\Admin;

use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class SoalController extends Controller
{
    public function index()
    {
        $soals = Soal::latest()->get();
        return view('pages.admin.soal.index', compact('soals'));
    }

    public function create()
    {
        return view('pages.admin.soal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'jenjang_kelas' => 'required|string|max:50',
            'semester' => 'required|string|max:50',
            'jenis_soal' => 'required|string|max:50',
            'tanggal_pembuatan' => 'required|date',
            'nama_guru' => 'required|string|max:255',
            'tujuan_pembelajaran' => 'nullable|string',
            'tingkat_kesulitan' => 'required|string|max:50',
            'format_soal' => 'nullable|string|max:100',
            'jumlah_soal' => 'required|integer',
            'keterangan_tambahan' => 'nullable|string',

            'file_soal' => 'nullable|mimes:pdf|max:20480',
            'kunci_jawaban' => 'nullable|mimes:pdf|max:20480',
            'rubrik_penilaian' => 'nullable|mimes:pdf|max:20480',
            'pedoman_penskoran' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->except(['file_soal', 'kunci_jawaban', 'rubrik_penilaian', 'pedoman_penskoran']);

        foreach (['file_soal', 'kunci_jawaban', 'rubrik_penilaian', 'pedoman_penskoran'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('dokumen_soal', 'public');
            }
        }

        Soal::create($data);

        toast('Data soal berhasil ditambahkan', 'success');
        return redirect()->route('soal.index');
    }

    public function show(string $id)
    {
        $soal = Soal::findOrFail($id);
        return view('pages.admin.soal.show', compact('soal'));
    }

    public function edit(string $id)
    {
        $soal = Soal::findOrFail($id);
        return view('pages.admin.soal.edit', compact('soal'));
    }

    public function update(Request $request, string $id)
    {
        $soal = Soal::findOrFail($id);

        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'jenjang_kelas' => 'required|string|max:50',
            'semester' => 'required|string|max:50',
            'jenis_soal' => 'required|string|max:50',
            'tanggal_pembuatan' => 'required|date',
            'nama_guru' => 'required|string|max:255',
            'tujuan_pembelajaran' => 'nullable|string',
            'tingkat_kesulitan' => 'required|string|max:50',
            'format_soal' => 'nullable|string|max:100',
            'jumlah_soal' => 'required|integer',
            'keterangan_tambahan' => 'nullable|string',

            'file_soal' => 'nullable|mimes:pdf|max:20480',
            'kunci_jawaban' => 'nullable|mimes:pdf|max:20480',
            'rubrik_penilaian' => 'nullable|mimes:pdf|max:20480',
            'pedoman_penskoran' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->except(['file_soal', 'kunci_jawaban', 'rubrik_penilaian', 'pedoman_penskoran']);

        foreach (['file_soal', 'kunci_jawaban', 'rubrik_penilaian', 'pedoman_penskoran'] as $file) {
            if ($request->hasFile($file)) {
                if ($soal->$file && Storage::disk('public')->exists($soal->$file)) {
                    Storage::disk('public')->delete($soal->$file);
                }
                $data[$file] = $request->file($file)->store('dokumen_soal', 'public');
            }
        }

        $soal->update($data);

        toast('Data soal berhasil diperbarui', 'success');
        return redirect()->route('soal.index');
    }

    public function destroy(string $id)
    {
        $soal = Soal::findOrFail($id);

        foreach (['file_soal', 'kunci_jawaban', 'rubrik_penilaian', 'pedoman_penskoran'] as $file) {
            if ($soal->$file && Storage::disk('public')->exists($soal->$file)) {
                Storage::disk('public')->delete($soal->$file);
            }
        }

        $soal->delete();

        toast('Data soal berhasil dihapus', 'success');
        return redirect()->route('soal.index');
    }
}
