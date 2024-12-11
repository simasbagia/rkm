<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data admin ke tabel admin
        DB::table('periode')->insert([
            'tahun' => "2022",
            'tanggal_buka' => "2022_06_02",
            'tanggal_tutup' => "2122_06_30",
            'aktif' => "Y",
        ]);
    }
}
