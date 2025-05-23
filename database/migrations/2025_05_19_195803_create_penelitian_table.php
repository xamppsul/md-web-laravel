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
        Schema::create('penelitian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('judul', 100);
            $table->string('bidang_ilmu', 100);
            $table->year('tahun');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->foreignId('penelitian_sumber_dana')->references('id')->on('penelitian_sumber_dana');
            $table->integer('jumlah_dana');
            $table->text('anggota_tim');
            $table->string('laporan_akhir');
            $table->foreignId('penelitian_status')->references('id')->on('penelitian_status');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitian');
    }
};
