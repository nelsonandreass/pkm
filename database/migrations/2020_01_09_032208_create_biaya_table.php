<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biayas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pkmid');
            $table->string('jenisbiaya')->nullable();
            $table->string('material')->nullable();
            $table->integer('justifikasipemakaian')->nullable();
            $table->integer('kuantitas')->nullable();
            $table->double('hargasatuan')->nullable();
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
        Schema::dropIfExists('biaya');
    }
}
