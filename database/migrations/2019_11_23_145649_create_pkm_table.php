<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('groupid')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->longText('pendahuluan')->nullable();
            $table->longText('gagasan')->nullable();
            $table->longText('kesimpulan')->nullable();
            $table->longText('daftarpustaka')->nullable();
            $table->longText('lampiran')->nullable();
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
        Schema::dropIfExists('pkm');
    }
}
