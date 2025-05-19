<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SumberDanaPenelitianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penelitian_sumber_dana')->insert([
            [
                'name' => 'Apbn',
                'description' => 'submber dana penelitian dari Apbn',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Hibah',
                'description' => 'submber dana penelitian dari Hibah',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Sponsor',
                'description' => 'submber dana penelitian dari Sponsor',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ]
        ]);
    }
}
