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
        Schema::create('mou_moa', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_dokumen');
            $table->foreignId('mou_moa_jenis_dokumen')->references('id')->on('mou_moa_jenis_dokumen');
            $table->string('nama_mitra');
            $table->string('judul_kerjasama');
            $table->foreignId('mou_moa_klasifikasi')->references('id')->on('mou_moa_klasifikasi');
            $table->year('tahun');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->foreignId('mou_moa_status')->references('id')->on('mou_moa_status');
            $table->foreignId('mou_moa_bidang_kerjasama')->references('id')->on('mou_moa_bidang_kerjasama');
            $table->foreignId('users_id')->references('id')->on('users'); //roles faculty: unit penanggung jawab
            $table->string('dokumen_pendukung')->nullable();
            $table->text('keterangan_tambahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou_moa');
    }
};
