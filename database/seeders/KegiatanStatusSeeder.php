<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Selesai',
                'keterangan' => 'kegiatan selesai',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Dibatalkan',
                'keterangan' => 'kegiatan dibatalkan',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
        ]);
    }
}
