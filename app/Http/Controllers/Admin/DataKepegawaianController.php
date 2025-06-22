<?php

namespace App\Http\Controllers\Admin;

use App\Models\DataKepegawaian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class DataKepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = DataKepegawaian::all();
        return view('pages.admin.kepegawaian.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kepegawaian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Data Identitas
            'nama_lengkap' => 'required|string|max:255',
            'nip_nik' => 'required|string|unique:data_kepegawaians',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:data_kepegawaians',
            'status_kepegawaian' => 'required|string',

            // Data Jabatan
            'jabatan_terakhir' => 'required|string',
            'unit_kerja' => 'required|string',
            'tmt' => 'required|date',
            'golongan_pangkat' => 'required|string',
            'nomor_sk_pengangkatan' => 'required|string',
            'tanggal_sk' => 'required|date',
            'instansi_pengangkat' => 'required|string',
            'riwayat_sekolah_instansi_sebelumnya' => 'nullable|string',
            'riwayat_penugasan_tambahan' => 'nullable|string',

            // Pendidikan
            'pendidikan_terakhir' => 'required|string',
            'nama_lembaga_pendidikan' => 'required|string',
            'jurusan' => 'required|string',

            // Dokumen
            'file_dokumen_pdf' => 'nullable|mimes:pdf|max:20480', // 20MB
        ]);

        $data = $request->all();

        if ($request->hasFile('file_dokumen_pdf')) {
            $data['file_dokumen_pdf'] = $request->file('file_dokumen_pdf')->store('dokumen_kepegawaian', 'public');
        }

        DataKepegawaian::create($data);
        toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('data-kepegawaian.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = DataKepegawaian::findOrFail($id);
        return view('pages.admin.kepegawaian.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = DataKepegawaian::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip_nik' => 'required|string|unique:data_kepegawaians,nip_nik,' . $pegawai->id,
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:data_kepegawaians,email,' . $pegawai->id,
            'status_kepegawaian' => 'required|string',

            'jabatan_terakhir' => 'required|string',
            'unit_kerja' => 'required|string',
            'tmt' => 'required|date',
            'golongan_pangkat' => 'required|string',
            'nomor_sk_pengangkatan' => 'required|string',
            'tanggal_sk' => 'required|date',
            'instansi_pengangkat' => 'required|string',
            'riwayat_sekolah_instansi_sebelumnya' => 'nullable|string',
            'riwayat_penugasan_tambahan' => 'nullable|string',

            'pendidikan_terakhir' => 'required|string',
            'nama_lembaga_pendidikan' => 'required|string',
            'jurusan' => 'required|string',

            'file_dokumen_pdf' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_dokumen_pdf')) {
            Storage::delete('public/' . $pegawai->file_dokumen_pdf);
            $data['file_dokumen_pdf'] = $request->file('file_dokumen_pdf')->store('dokumen_kepegawaian', 'public');
        }

        $pegawai->update($data);
        toast('Data berhasil diperbarui', 'success');
        return redirect()->route('data-kepegawaian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = DataKepegawaian::findOrFail($id);
        Storage::delete('public/' . $pegawai->file_dokumen_pdf);
        $pegawai->delete();
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('data-kepegawaian.index');
    }

    public function show(string $id)
    {
        $pegawai = DataKepegawaian::findOrFail($id);
        return view('pages.admin.kepegawaian.show', compact('pegawai'));
    }
}
