<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Kendaraan',
                'keterangan' => 'aset kendaraan',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Furniture',
                'keterangan' => 'aset furniture',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Lainnya',
                'keterangan' => 'aset lainnya',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ]
        ]);
    }
}
