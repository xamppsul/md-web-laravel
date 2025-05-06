<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'administrator@gmail.com',
            'password' => Hash::make('administrator'),
            'roles_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Staff',
                'username' => 'staffdosen',
                'email' => 'staffdosen@gmail.com',
                'password' => Hash::make('staffdosen'),
                'roles_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Uppsfakultas',
                'username' => 'uppsfakultas',
                'email' => 'uppsfakultas@gmail.com',
                'password' => Hash::make('uppsfakultas'),
                'roles_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
