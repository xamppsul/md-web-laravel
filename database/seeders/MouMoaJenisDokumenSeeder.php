<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MouMoaJenisDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mou_moa_jenis_dokumen')->insert([
            [
                'name' => 'Mou',
                'keterangan' => 'Dokumen berbasis Mou',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Moa',
                'keterangan' => 'Dokumen berbasis Moa',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
        ]);
    }
}
