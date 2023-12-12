<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeminjamBuku1278sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peminjam_buku', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nama_peminjam')->nullable();
            $table->string('asal_instansi')->nullable();
            $table->string('judul_buku_dipinjam')->nullable();
            $table->timestamp('waktu_peminjaman')->nullable();
            $table->timestamp('waktu_pengembalian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_peminjam_buku');
    }
}
