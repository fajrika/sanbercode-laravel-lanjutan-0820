<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('buku_id');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_batas_akhir_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->boolean('status_ontime')->nullable();
            $table->timestamps();
            // $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            // $table->foreign('buku_id')->references('id')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function ($table) {
        //     $table->dropForeign(['mahasiswa_id', 'buku_id']);
        // });
        Schema::dropIfExists('pinjaman');
    }
}
