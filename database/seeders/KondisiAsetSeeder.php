<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KondisiAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kondisi_aset')->insert([
            [
                'name' => 'Baik',
                'keterangan' => 'kondisi baik',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
            [
                'name' => 'Rusak',
                'keterangan' => 'kondisi rusak',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
            [
                'name' => 'Perlu Perbaikan',
                'keterangan' => 'kondisi perlu perbaikan',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
        ]);
    }
}
