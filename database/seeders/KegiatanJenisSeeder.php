<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Workshop',
                'keterangan' => 'kegiatan workshop',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Pelatihan',
                'keterangan' => 'kegiatan pelatihan',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Pengabdian',
                'keterangan' => 'kegiatan pengabdian',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
        ]);
    }
}
