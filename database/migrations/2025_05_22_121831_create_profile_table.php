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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->bigInteger('nidn')->nullable();
            $table->bigInteger('nip')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->foreignId('profile_status_perkawinan')->references('id')->on('profile_status_perkawinan');
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('jabatan_akademik')->nullable();
            $table->string('jabatan_golongan')->nullable();
            $table->foreignId('profile_status_ikatan_kerja')->references('id')->on('profile_status_ikatan_kerja');
            $table->foreignId('profile_status_mengajar')->references('id')->on('profile_status_mengajar');
            $table->string('photo')->nullable();
            $table->string('photo_banner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
