<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'guard_name' => 'admin',
                'description' => 'Administrator Role',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Staff',
                'guard_name' => 'user',
                'description' => 'Staff Role',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ],
            [
                'name' => 'Uppsfakultas',
                'guard_name' => 'user',
                'description' => 'Uppsfakultas Role',
                'created_at' => Carbon::now()->timezone(env('APP_TIMEZONE', 'Asia/Jakarta')),
            ]
        ]);
    }
}
