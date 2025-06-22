<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->get();
        return view('pages.admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('pages.admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Identitas
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'nisn' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:50',
            'alamat_lengkap' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',

            // Orang tua
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ortu' => 'nullable|string|max:100',
            'alamat_ortu' => 'nullable|string',
            'no_hp_ortu' => 'nullable|string|max:20',

            // Akademik
            'kelas_sekarang' => 'nullable|string|max:50',
            'tahun_masuk' => 'nullable|string|max:10',
            'riwayat_kenaikan_kelas' => 'nullable|string',

            // Dokumen
            'akta_kelahiran' => 'nullable|mimes:pdf|max:20480',
            'kartu_keluarga' => 'nullable|mimes:pdf|max:20480',
            'foto' => 'nullable|image|max:2048',
            'nilai_rapor' => 'nullable|mimes:pdf|max:20480',
            'surat_mutasi' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->except(['akta_kelahiran', 'kartu_keluarga', 'foto', 'nilai_rapor', 'surat_mutasi']);

        foreach (['akta_kelahiran', 'kartu_keluarga', 'foto', 'nilai_rapor', 'surat_mutasi'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('dokumen_siswa', 'public');
            }
        }

        Siswa::create($data);

        toast('Data siswa berhasil ditambahkan', 'success');
        return redirect()->route('siswa.index');
    }

    public function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.admin.siswa.show', compact('siswa'));
    }

    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'nisn' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:50',
            'alamat_lengkap' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',

            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ortu' => 'nullable|string|max:100',
            'alamat_ortu' => 'nullable|string',
            'no_hp_ortu' => 'nullable|string|max:20',

            'kelas_sekarang' => 'nullable|string|max:50',
            'tahun_masuk' => 'nullable|string|max:10',
            'riwayat_kenaikan_kelas' => 'nullable|string',

            'akta_kelahiran' => 'nullable|mimes:pdf|max:20480',
            'kartu_keluarga' => 'nullable|mimes:pdf|max:20480',
            'foto' => 'nullable|image|max:2048',
            'nilai_rapor' => 'nullable|mimes:pdf|max:20480',
            'surat_mutasi' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->except(['akta_kelahiran', 'kartu_keluarga', 'foto', 'nilai_rapor', 'surat_mutasi']);

        foreach (['akta_kelahiran', 'kartu_keluarga', 'foto', 'nilai_rapor', 'surat_mutasi'] as $file) {
            if ($request->hasFile($file)) {
                if ($siswa->$file && Storage::disk('public')->exists($siswa->$file)) {
                    Storage::disk('public')->delete($siswa->$file);
                }
                $data[$file] = $request->file($file)->store('dokumen_siswa', 'public');
            }
        }

        $siswa->update($data);

        toast('Data siswa berhasil diperbarui', 'success');
        return redirect()->route('siswa.index');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        foreach (['akta_kelahiran', 'kartu_keluarga', 'foto', 'nilai_rapor', 'surat_mutasi'] as $file) {
            if ($siswa->$file && Storage::disk('public')->exists($siswa->$file)) {
                Storage::disk('public')->delete($siswa->$file);
            }
        }

        $siswa->delete();

        toast('Data siswa berhasil dihapus', 'success');
        return redirect()->route('siswa.index');
    }
}
