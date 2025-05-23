<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusPengabdianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengabdian_status')->insert([
            [
                'name' => 'Ongoing',
                'description' => 'status pengabdian Ongoing',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Selesai',
                'description' => 'status pengabdian Selesai',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Dibatalkan',
                'description' => 'status pengabdian Dibatalkan',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ]
        ]);
    }
}
