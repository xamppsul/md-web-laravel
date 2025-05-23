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
        Schema::create('bahan_ajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('judul');
            $table->foreignId('bahan_ajar_jenis')->references('id')->on('bahan_ajar_jenis');
            $table->string('mata_kuliah', 100);
            $table->string('program_studi', 100);
            $table->integer('semester');
            $table->date('tanggal_terbit');
            $table->text('deskripsi');
            $table->string('file_bahan', 100);
            $table->string('link_bahan', 100);
            $table->foreignId('bahan_ajar_status_penggunaan')->references('id')->on('bahan_ajar_status_penggunaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_ajar');
    }
};
