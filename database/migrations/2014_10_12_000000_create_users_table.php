<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('email')->unique();
            $table->string('nidn')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->string('tanggallahir')->nullable();
            $table->string('nomortelepon')->nullable();
            $table->string('password');
            $table->string('roles')->default('MAHASISWA');
            $table->string('susunanorganisasi')->nullable();
            $table->integer('groupid')->nullable();
            $table->string('bidangilmu')->nullable();
            $table->string('alokasiwaktu')->nullable();
            $table->string('uraiantugas')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}