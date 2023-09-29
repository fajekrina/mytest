<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_sewa', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->unsignedBigInteger('id_titip');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);

            $table->foreign('id_titip')->references('id_titip')->on('trans_titip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_sewa');
    }
}
