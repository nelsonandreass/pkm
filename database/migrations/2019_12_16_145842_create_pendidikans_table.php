<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nim_id')->nullable();
            $table->string('sd')->nullable();
            $table->string('smp')->nullable();
            $table->string('sma')->nullable();
            $table->string('jurusansd')->nullable();
            $table->string('jurusansmp')->nullable();
            $table->string('jurusansma')->nullable();
            $table->string('tahunsd')->nullable();
            $table->string('tahunsmp')->nullable();
            $table->string('tahunsma')->nullable();
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('jurusans1')->nullable();
            $table->string('jurusans2')->nullable();
            $table->string('jurusans3')->nullable();
            $table->string('tahuns1')->nullable();
            $table->string('tahuns2')->nullable();
            $table->string('tahuns3')->nullable();
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
        Schema::dropIfExists('pendidikans');
    }
}
