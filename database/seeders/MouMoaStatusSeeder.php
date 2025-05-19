<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MouMoaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mou_moa_status')->insert([
            [
                'name' => 'Aktif',
                'keterangan' => 'status aktif',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Selesai',
                'keterangan' => 'status Selesai',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Berakhir',
                'keterangan' => 'status Berakhir',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
        ]);
    }
}
