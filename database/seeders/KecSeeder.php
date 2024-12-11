<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data admin ke tabel admin
        DB::table('kec')->insert(array(
            [
                'nama_kec' => "Magelang Selatan",
                'singkatan' => "Mgl_Selatan",
            ],
            [
                'nama_kec' => "Magelang Tengah",
                'singkatan' => "Mgl_Tengah",
            ],
            [
                'nama_kec' => "Magelang Utara",
                'singkatan' => "Mgl_Utara",
            ],
        ));
    }
}
