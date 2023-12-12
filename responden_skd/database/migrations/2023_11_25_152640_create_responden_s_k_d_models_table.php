<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondenSKDModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responden_skd_gusit', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('service_status')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('data_request_time')->nullable();
            $table->text('type_data_request')->nullable();
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
        Schema::dropIfExists('responden_skd_gusit');
    }
}
