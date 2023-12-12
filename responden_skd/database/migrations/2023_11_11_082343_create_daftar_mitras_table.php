<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarMitrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Schema::dropIfExists('gusit');
        Schema::create('daftar_mitra', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('id_desa_mitra');
            $table->string('id_sls_mitra');
            $table->string('nama_mitra');
            $table->string('alamat_mitra')->nullable();
            $table->float('latitude', 8, 5)->nullable();
            $table->float('longitude', 100, 5)->nullable();
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
        Schema::dropIfExists('daftar_mitra');
    }
}
