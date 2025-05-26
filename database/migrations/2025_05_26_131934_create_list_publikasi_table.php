<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('list_publikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('judul_publikasi');
            $table->foreignId('list_publikasi_jenis')->references('id')->on('list_publikasi_jenis');
            $table->string('nama_jurnal');
            $table->string('volume');
            $table->integer('nomor');
            $table->date('tahun_terbit');
            $table->date('tanggal_terbit');
            $table->string('penulis_lain');
            $table->string('link_publikasi');
            $table->string('file_publikasi');
            $table->string('doi');
            $table->foreignId('list_publikasi_status')->references('id')->on('list_publikasi_status');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_publikasi');
    }
};
