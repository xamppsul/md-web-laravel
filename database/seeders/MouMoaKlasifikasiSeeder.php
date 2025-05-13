<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MouMoaKlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mou_moa_klasifikasi')->insert([
            [
                'name' => 'Dalam negeri',
                'keterangan' => 'klasifikasi dalam negeri',
                'created_at' => now(),
            ],
            [
                'name' => 'Luar negeri',
                'keterangan' => 'klasifikasi luar negeri',
                'created_at' => now(),
            ],
        ]);
    }
}
