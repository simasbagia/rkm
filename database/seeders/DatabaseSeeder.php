<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //memanggil seeder
        $this->call([
            // AdminSeeder::class,
            // SettingSeeder::class,
            // PeriodeSeeder::class,
            // KecSeeder::class,
            // KelSeeder::class,
            // RwSeeder::class,
            // RtSeeder::class,
            // TpsSeeder::class,
            // WargaSeeder::class,
            // UserSeeder::class,
        ]);
    }
}
