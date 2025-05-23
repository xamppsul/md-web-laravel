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
            $table->string('kode_aset');
            $table->string('nama_aset');
            $table->foreignId('kategori_aset')->references('id')->on('kategori_aset');
            $table->string('merek_model');
            $table->date('tanggal_perolehan');
            $table->string('lokasi_aset');
            $table->foreignId('kondisi_aset')->references('id')->on('kondisi_aset');
            $table->foreignId('status_aset')->references('id')->on('status_aset');
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
