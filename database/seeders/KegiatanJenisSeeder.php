<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan_jenis')->insert([
            [
                'name' => 'Seminar',
                'keterangan' => 'kegiatan seminar',
                'created_at' => now(),
            ],
            [
                'name' => 'Workshop',
                'keterangan' => 'kegiatan workshop',
                'created_at' => now(),
            ],
            [
                'name' => 'Pelatihan',
                'keterangan' => 'kegiatan pelatihan',
                'created_at' => now(),
            ],
            [
                'name' => 'Pengabdian',
                'keterangan' => 'kegiatan pengabdian',
                'created_at' => now(),
            ],
        ]);
    }
}
