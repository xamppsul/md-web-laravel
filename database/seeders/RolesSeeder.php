<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff',
                'guard_name' => 'user',
                'description' => 'Staff Role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Uppsfakultas',
                'guard_name' => 'user',
                'description' => 'Uppsfakultas Role',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
