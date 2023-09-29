<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransTitipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_titip', function (Blueprint $table) {
            $table->id('id_titip');
            $table->unsignedBigInteger('id_kendaraan');
            $table->date('tgl_titip');
            $table->integer('harga_sewa');
            $table->date('tgl_berakhir')->nullable();
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);

            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('m_kendaraan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_titip');
    }
}
