<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data admin ke tabel admin
        DB::table('warga')->insert(array(
            [
                'dpt_id' => "1",
                'kta' => "belum",
                'sosial' => "-",
                'status' => "relawan",
            ],
        ));
    }
}
