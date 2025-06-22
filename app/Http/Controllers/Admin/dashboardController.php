<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\DataKepegawaian;
use App\Models\DokumenSekolah;
use App\Models\Soal;
use App\Models\Siswa;
use App\Models\SuratMasukKeluar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class dashboardController extends Controller
{
  public function index()
{
    $user = User::count();
    $kepegawaian = DataKepegawaian::count();
    $dokumen = DokumenSekolah::count();
    $soal = Soal::count();
    $siswa = Siswa::count();
    $surat = SuratMasukKeluar::count();

    return view('pages.dashboard', compact(
        'user', 'kepegawaian', 'dokumen', 'soal', 'siswa', 'surat'
    ));
}


    public function error()
    {
        return view('error.401');
    }



}
