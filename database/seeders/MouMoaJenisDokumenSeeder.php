<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MouMoaJenisDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mou_moa_jenis_dokumen')->insert([
            [
                'name' => 'Mou',
                'keterangan' => 'Dokumen berbasis Mou',
                'created_at' => now(),
            ],
            [
                'name' => 'Moa',
                'keterangan' => 'Dokumen berbasis Moa',
                'created_at' => now(),
            ],
        ]);
    }
}
