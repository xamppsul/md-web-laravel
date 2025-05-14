<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KegiatanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan_status')->insert([
            [
                'name' => 'Terjadwal',
                'keterangan' => 'kegiatan terjadwal',
                'created_at' => now(),
            ],
            [
                'name' => 'Selesai',
                'keterangan' => 'kegiatan selesai',
                'created_at' => now(),
            ],
            [
                'name' => 'Dibatalkan',
                'keterangan' => 'kegiatan dibatalkan',
                'created_at' => now(),
            ],
        ]);
    }
}
