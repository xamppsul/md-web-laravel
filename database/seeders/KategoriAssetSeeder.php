<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_aset')->insert([
            [
                'name' => 'Elektronik',
                'keterangan' => 'aset elektronik',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
            [
                'name' => 'Kendaraan',
                'keterangan' => 'aset kendaraan',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
            [
                'name' => 'Furniture',
                'keterangan' => 'aset furniture',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ],
            [
                'name' => 'Lainnya',
                'keterangan' => 'aset lainnya',
                'created_at' => now()->timezone(env('APP_TIMEZONE')),
            ]
        ]);
    }
}
