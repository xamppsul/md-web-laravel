<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'password' => Hash::make('administrator!!@9321'),
            'roles_id' => 1,
            'created_at' => Carbon::now()->timezone(config('app.timezone')),
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Dosen',
                'username' => 'dosen',
                'email' => 'dosen@gmail.com',
                'password' => Hash::make('dosen!!@9321'),
                'roles_id' => 2,
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'samsul',
                'username' => 'samsuldosen',
                'email' => 'muhdevapp@gmail.com',
                'password' => Hash::make('Codingweb1129321!@#$'),
                'roles_id' => 2,
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'FEBI UMK',
                'username' => 'fakultas',
                'email' => 'fakultas@gmail.com',
                'password' => Hash::make('fakultas!!@9321'),
                'roles_id' => 3,
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ]
        ]);
    }
}
