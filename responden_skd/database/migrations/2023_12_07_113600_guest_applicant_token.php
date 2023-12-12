<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GuestApplicantToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responden_skd_gusit', function (Blueprint $table) {
            $table->string('applicant_token', 80)->after('updated_at')
                                            ->nullable()
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
        Schema::table('responden_skd_gusit', function (Blueprint $table) {
            //
        });
    }
}
