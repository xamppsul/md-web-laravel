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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('kode_aset');
            $table->string('nama_aset');
            $table->foreignId('aset_kategori')->references('id')->on('aset_kategori');
            $table->string('merek_model');
            $table->year('tahun');
            $table->date('tanggal_perolehan');
            $table->string('lokasi_aset');
            $table->foreignId('aset_kondisi')->references('id')->on('aset_kondisi');
            $table->foreignId('aset_status')->references('id')->on('aset_status');
            $table->integer('harga_perolehan');
            $table->string('sumber_dana');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
