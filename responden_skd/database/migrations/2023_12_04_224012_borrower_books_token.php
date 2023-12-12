<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BorrowerBooksToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_peminjam_buku', function (Blueprint $table) {
            $table->string('token_pengguna', 80)->after('updated_at')
                                            ->nullable()
                                            ->unique()
                                            ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_peminjam_buku', function (Blueprint $table) {
            //
        });
    }
}
