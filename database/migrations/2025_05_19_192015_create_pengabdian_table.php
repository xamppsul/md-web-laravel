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
        Schema::create('pengabdian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('judul');
            $table->foreignId('pengabdian_bidang')->references('id')->on('pengabdian_bidang');
            $table->foreignId('pengabdian_sumber_dana')->references('id')->on('pengabdian_sumber_dana');
            $table->year('tahun');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('lokasi');
            $table->integer('jumlah_peserta');
            $table->string('laporan_pengabdian');
            $table->string('dokumentasi');
            $table->foreignId('pengabdian_status')->references('id')->on('pengabdian_status');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengabdian');
    }
};
