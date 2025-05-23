<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileStatusIkatanKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profile_status_ikatan_kerja')->insert([
            [
                'name' => 'Tetap',
                'keterangan' => 'Status Ikatan Kerja Tetap',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Kontrak',
                'keterangan' => 'Status Ikatan Kerja Kontrak',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
        ]);
    }
}
