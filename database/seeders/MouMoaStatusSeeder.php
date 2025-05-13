<?php

namespace Database\Seeders;

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
                'created_at' => now(),
            ],
            [
                'name' => 'Selesai',
                'keterangan' => 'status Selesai',
                'created_at' => now(),
            ],
            [
                'name' => 'Berakhir',
                'keterangan' => 'status Berakhir',
                'created_at' => now(),
            ],
        ]);
    }
}
