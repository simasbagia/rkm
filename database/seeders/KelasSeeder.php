<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //memasukkan data kelas ke tabel kelas
        DB::table('kelas')->insert(
            array(

                [
                    'nama_kelas' => "Abbas",
                    'jenjang_id' => "1",
                    'unit_id' => "1",
                    'deskripsi' => ""
                ],
                [
                    'nama_kelas' => "Bilal",
                    'jenjang_id' => "2",
                    'unit_id' => "2",
                    'deskripsi' => ""
                ],
                [
                    'nama_kelas' => "Uwais",
                    'jenjang_id' => "2",
                    'unit_id' => "2",
                    'deskripsi' => ""
                ],
                [
                    'nama_kelas' => "Umar",
                    'jenjang_id' => "3",
                    'unit_id' => "2",
                    'deskripsi' => ""
                ],
                [
                    'nama_kelas' => "Ali",
                    'jenjang_id' => "3",
                    'unit_id' => "2",
                    'deskripsi' => ""
                ],
                [
                    'nama_kelas' => "1A",
                    'jenjang_id' => "4",
                    'unit_id' => "3",
                    'deskripsi' => ""
                ]
            )
        );
    }
}
