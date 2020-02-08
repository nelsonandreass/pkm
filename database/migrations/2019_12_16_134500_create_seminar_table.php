<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nim_id')->nullable();
            $table->string('namaseminar1')->nullable();
            $table->string('judulseminar1')->nullable();
            $table->string('waktu1')->nullable();
            $table->string('namaseminar2')->nullable();
            $table->string('judulseminar2')->nullable();
            $table->string('waktu2')->nullable();
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
        Schema::dropIfExists('seminar');
    }
}
