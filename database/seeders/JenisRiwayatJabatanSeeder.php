<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisRiwayatJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riwayat_jabatan_jenis')->insert([
            [
                'name' => 'Struktural',
                'description' => 'jenis riwayat jabatan Struktural',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Fungsional',
                'description' => 'jenis riwayat jabatan Fungsional',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
        ]);
    }
}
