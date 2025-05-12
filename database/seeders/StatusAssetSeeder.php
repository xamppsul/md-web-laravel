<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_aset')->insert([
            [
                'name' => 'Aktif',
                'keterangan' => 'status aktif',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
            [
                'name' => 'Tidak Aktif',
                'keterangan' => 'status nonaktif',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
            [
                'name' => 'Dihapus',
                'keterangan' => 'status dihapus',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
        ]);
    }
}
