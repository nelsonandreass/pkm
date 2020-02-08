<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghargaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghargaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nim_id')->nullable();
            $table->string('jenispenghargaan1')->nullable();
            $table->string('institusi1')->nullable();
            $table->string('tahun1')->nullable();
            $table->string('jenispenghargaan2')->nullable();
            $table->string('institusi2')->nullable();
            $table->string('tahun2')->nullable();
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
        Schema::dropIfExists('penghargaan');
    }
}
