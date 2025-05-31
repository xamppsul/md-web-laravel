<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SumberDanaPengabdianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengabdian_sumber_dana')->insert([
            [
                'name' => 'Mandiri',
                'description' => 'submber dana penelitian dari Mandiri',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'ABPD',
                'description' => 'submber dana penelitian dari APBD',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ]
        ]);
    }
}
