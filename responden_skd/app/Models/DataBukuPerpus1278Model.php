<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBukuPerpus1278Model extends Model
{
    use HasFactory;

    protected $table = "perpus_1278";

    protected $fillable = [
        'judul_buku',
        'cakupan_analisis',
        'level_publikasi',
        'lokasi_penyimpanan',
        'nomor_rak'
    ];
}
