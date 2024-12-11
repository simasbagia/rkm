<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //memasukkan data jenjang ke tabel jenjang
        DB::table('jenjang')->insert(
            array(

                [
                    'nama_jenjang' => "PG",
                    'unit_id' => 1,
                    'deskripsi' => "Usia 2 s/d >5th"
                ],
                [
                    'nama_jenjang' => "TK A",
                    'unit_id' => 2,
                    'deskripsi' => "Usia 4 s/d 5th"
                ],
                [
                    'nama_jenjang' => "TK B",
                    'unit_id' => 2,
                    'deskripsi' => "Usia 5 s/d 6th"
                ],
                [
                    'nama_jenjang' => "1",
                    'unit_id' => 3,
                    'deskripsi' => "SD"
                ]
            )
        );
    }
}
