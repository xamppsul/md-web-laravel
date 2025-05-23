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
        Schema::create('riwayat_jabatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('nama_jabatan');
            $table->foreignId('riwayat_jabatan_jenis')->references('id')->on('riwayat_jabatan_jenis');
            $table->string('unit_kerja');
            $table->string('no_sk_jabatan');
            $table->date('tanggal_sk');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('dokumen_sk');
            $table->foreignId('riwayat_jabatan_status')->references('id')->on('riwayat_jabatan_status');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_jabatan');
    }
};
