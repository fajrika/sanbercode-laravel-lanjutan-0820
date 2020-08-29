<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('nim')->unique();
            $table->string('fakultas');
            $table->string('jurusan');
            $table->string('no_hp');
            $table->string('no_wa');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('mahasiswa', function ($table) {
        //     $table->dropForeign(['user_id']);
        // });
        Schema::dropIfExists('mahasiswa');
    }
}
