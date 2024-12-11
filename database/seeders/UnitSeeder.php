<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data admin ke tabel admin
        DB::table('unit')->insert(array(
            [
                'nama_unit' => "KBIT Asy-Syaffa 1",
                'singkatan' => "KB1",
                'alamat' => "Jl. Inspeksi Kalibening, Kp. Tulung",
            ],
            [
                'nama_unit' => "TKIT Asy-Syaffa` 1",
                'singkatan' => "TK1",
                'alamat' => "Jl. Inspeksi Kalibening, Kp. Tulung",
            ],
            [
                'nama_unit' => "SDIT Ihsanul Fikri",
                'singkatan' => "SD1",
                'alamat' => "Jl. Jeruk Timur V, Sanden",
            ],
        ));
    }
}
