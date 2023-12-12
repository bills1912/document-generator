<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugasBPS1278Model extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas';

    protected $fillable = [
        'nomor_surat',
        'jabatan',
        'kegiatan',
        'mulai_kegiatan',
        'akhir_kegiatan',
        'tanggal_ttd',
    ];
}
