<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolesSeeder::class,
            AccountSeeder::class,
            KategoriAssetSeeder::class,
            KondisiAsetSeeder::class,
            StatusAssetSeeder::class,
            MouMoaKlasifikasiSeeder::class,
            MouMoaBidangKerjaSamaSeeder::class,
            MouMoaStatusSeeder::class,
            MouMoaJenisDokumenSeeder::class,
            KegiatanJenisSeeder::class,
            KegiatanStatusSeeder::class,
            JenisBahanAjarSeeder::class,
            StatusPenelitianSeeder::class,
            StatusPengabdianSeeder::class,
            StatusPenggunaanBahanAjarSeeder::class,
            SumberDanaPenelitianSeeder::class,
            SumberDanaPengabdianSeeder::class,
        ]);
    }
}
