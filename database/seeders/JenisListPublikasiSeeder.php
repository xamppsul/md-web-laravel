<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisListPublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_publikasi_jenis')->insert([
            [
                'name' => 'Jurnal Nasional',
                'keterangan' => 'jenis publikasi Jurnal Nasional',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Jurnal International',
                'keterangan' => 'jenis publikasi Jurnal Internasional',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Prosiding',
                'keterangan' => 'jenis publikasi Prosiding',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Buku',
                'keterangan' => 'jenis publikasi Buku',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
            [
                'name' => 'Artikel',
                'keterangan' => 'jenis publikasi Artikel',
                'created_at' => Carbon::now()->timezone(config('app.timezone')),
            ],
        ]);
    }
}
