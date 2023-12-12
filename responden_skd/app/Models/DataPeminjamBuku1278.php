<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeminjamBuku1278 extends Model
{
    use HasFactory;

    protected $table = 'data_peminjam_buku';

    protected $fillable = [
        'nama_peminjam',
        'asal_instansi',
        'judul_buku_dipinjam',
        'waktu_peminjaman',
        'waktu_pengembalian',
        'token_pengguna',
    ];
}
