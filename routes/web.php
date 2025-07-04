<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;

use App\Http\Controllers\Admin\SiswaController;

use App\Http\Controllers\Admin\DataKepegawaianController;
use App\Http\Controllers\Admin\{adminController, dashboardController, DokumenSekolahController, SoalController, SuratMasukKeluarController};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::get('/error-page', [dashboardController::class, 'error'])->name('error');

Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {

    // dashboard
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

    // profile
    Route::get('/profile/{encryptedId}/edit', [profileController::class, 'index'])->name('profile.index');
    Route::put('/profile/password-update', [profileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::put('/profile/{id}', [profileController::class, 'update'])->name('profile.update');



    Route::middleware(['Admin'])->group(function () {

        // crud admin
        Route::resource('/admin', adminController::class);
        Route::resource('data-kepegawaian', DataKepegawaianController::class);
        Route::resource('surat-masuk-keluar', SuratMasukKeluarController::class);
        Route::resource('soal', SoalController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('dokumen-sekolah', DokumenSekolahController::class);
    });



    Route::middleware(['StafTu'])->group(function () {

        Route::resource('data-kepegawaian', DataKepegawaianController::class);
        Route::resource('surat-masuk-keluar', SuratMasukKeluarController::class);
        Route::resource('soal', SoalController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('dokumen-sekolah', DokumenSekolahController::class);
    });
    Route::middleware(['KepalaSekolah'])->group(function () {

        Route::resource('data-kepegawaian', DataKepegawaianController::class);
        Route::resource('surat-masuk-keluar', SuratMasukKeluarController::class);
        Route::resource('soal', SoalController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('dokumen-sekolah', DokumenSekolahController::class);
    });
    Route::middleware(['Guru'])->group(function () {

        Route::resource('data-kepegawaian', DataKepegawaianController::class);
        Route::resource('surat-masuk-keluar', SuratMasukKeluarController::class);
        Route::resource('soal', SoalController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('dokumen-sekolah', DokumenSekolahController::class);
    });
});
