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
            $table->string('kode_aset')->unique();
            $table->string('nama_aset');
            $table->string('kategori_aset');
            $table->string('merek_model');
            $table->date('tanggal_perolehan');
            $table->string('lokasi_aset');
            $table->enum('kondisi_aset', ['Baik', 'Rusak', 'Perlu Perbaikan']);
            $table->enum('status_aset', ['Aktif', 'Tidak Aktif', 'Dihapus']);
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
