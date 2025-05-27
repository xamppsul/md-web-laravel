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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users'); //roles faculty: for campus activity
            $table->string('nama_kegiatan');
            $table->foreignId('kegiatan_jenis')->references('id')->on('kegiatan_jenis');
            $table->date('tanggal_kegiatan');
            $table->string('tempat_lokasi');
            $table->string('penyelenggara');
            $table->integer('jumlah_peserta');
            $table->string('file_daftar_hadir');
            $table->string('file_kegiatan');
            $table->foreignId('kegiatan_status')->references('id')->on('kegiatan_status');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
