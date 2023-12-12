<?php

use App\Http\Controllers\PerpusBPSGusit;
use App\Http\Controllers\SimaneredaController;
use App\Http\Controllers\SKDRespondenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* -- General -- */
Route::get('/', [SimaneredaController::class, 'index'])->middleware(['auth']);
Route::get('/projects', [SimaneredaController::class, 'projects'])->middleware(['auth']);

/* -- NSO User -- */
Route::get('/guest/generate_dokumen/surat_tugas', [SimaneredaController::class, 'generateSuratTugas'])->middleware(['auth', 'nso_stakeholder']);
Route::post('/guest/generate_dokumen/surat_tugas', [SimaneredaController::class, 'tambahSuratTugas']);
Route::post('/guest/generate_dokumen/surat_tugas/{id}', [SimaneredaController::class, 'editSuratTugas']);
Route::get('/guest/generate_dokumen/surat_tugas/{id}', [SimaneredaController::class, 'hapusDataSuratTugas']);

/* -- Guest Section -- */
// Permintaan Data
Route::get('/guest/permintaan_data', [SimaneredaController::class, 'guestPermintaanData'])->middleware(['auth']);
Route::get('/guest/permintaan_data/form_permintaan_data', [SimaneredaController::class, 'formPermintaanData'])->middleware(['auth']);
Route::post('/guest/permintaan_data/form_permintaan_data', [SimaneredaController::class, 'tambahDataResponden']);
Route::post('/guest/permintaan_data/{id}', [SimaneredaController::class, 'editDataResponden']);
Route::get('/guest/permintaan_data/{id}', [SimaneredaController::class, 'hapusDataResponden']);

// Sistem Perpustakaan
Route::get('/guest/pinjam_buku', [SimaneredaController::class, 'sistemPerpus'])->middleware(['auth']);
Route::get('/guest/pinjam_buku/tabel_buku_dipinjam', [SimaneredaController::class, 'tabelBukuDipinjam'])->middleware(['auth']);
Route::get('/guest/pinjam_buku/judulBukuDipinjam', [SimaneredaController::class, 'pilihJudulBuku']);
Route::get('/guest/pinjam_buku/editJudulBukuDipinjam', [SimaneredaController::class, 'pilihJudulBukuBaru']);
Route::post('/guest/pinjam_buku/tabel_buku_dipinjam', [SimaneredaController::class, 'tambahDataPeminjamBuku']);
Route::post('/guest/pinjam_buku/update_data_peminjam/{id}', [SimaneredaController::class, 'editDataPeminjamBuku']);
Route::get('/guest/pinjam_buku/tabel_buku_dipinjam/{id}', [SimaneredaController::class, 'hapusDataPeminjamBuku']);

/* -- Admin Section -- */
// Home
Route::get('/admin', [SKDRespondenController::class, 'admin'])->middleware(['auth', 'admin']);

// Permintaan Data
Route::get('/admin/data_responden', [SKDRespondenController::class, 'dataResponden'])->middleware(['auth', 'admin']);
Route::get('/admin/data_responden/{id}', [SKDRespondenController::class, 'hapusDataResponden']);
Route::post('/admin/data_responden', [SKDRespondenController::class, 'tambahDataResponden']);
Route::post('/admin/update_responden/{id}', [SKDRespondenController::class, 'editDataResponden']);

// Daftar Buku
Route::get('/admin/data_buku_perpus', [PerpusBPSGusit::class, 'dataBukuPerpus'])->middleware(['auth', 'admin']);
Route::get('/admin/data_buku_perpus/{id}', [PerpusBPSGusit::class, 'hapusDataBuku']);
Route::post('/admin/data_buku_perpus', [PerpusBPSGusit::class, 'tambahDataBuku']);
Route::post('/admin/update_data_buku/{id}', [PerpusBPSGusit::class, 'editDataBuku']);

// Peminjaman Buku
Route::get('/admin/data_peminjam_buku', [PerpusBPSGusit::class, 'dataPeminjamBuku'])->middleware(['auth', 'admin']);
Route::get('/admin/judulBukuDipinjam', [PerpusBPSGusit::class, 'pilihJudulBuku']);
Route::get('/admin/adminEditJudulBukuDipinjam', [PerpusBPSGusit::class, 'pilihJudulBukuBaru']);
Route::get('/admin/data_peminjam_buku/{id}', [PerpusBPSGusit::class, 'hapusDataPeminjamBuku']);
Route::post('/admin/data_peminjam_buku', [PerpusBPSGusit::class, 'tambahDataPeminjamBuku']);
Route::post('/admin/update_data_peminjam/{id}', [PerpusBPSGusit::class, 'editDataPeminjamBuku']);


require __DIR__ . '/auth.php';
