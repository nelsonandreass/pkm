<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkmKcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkm_k', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('groupid')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->longText('pendahuluan')->nullable();
            $table->longText('tinjauanpustaka')->nullable();
            $table->longText('metodepelaksanaan')->nullable();
            $table->longText('biaya')->nullable();
            $table->longText('daftarpustaka')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pkm_kc');
    }
}
