<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BidangPengabdianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengabdian_bidang')->insert([
            [
                'name' => 'Pendidikan',
                'description' => 'Bidang pendidikan',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Kesehatan',
                'description' => 'Bidang kesehatan',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Lingkungan',
                'description' => 'Bidang lingkungan',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
        ]);
    }
}
