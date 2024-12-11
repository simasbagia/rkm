<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data admin ke tabel admin
        DB::table('kel')->insert(
            array(
                [
                    'nama_kel' => 'Magersari',
                    'singkatan' => 'Magersari',
                    'kec_id' => 1
                ],
                [
                    'nama_kel' => 'Jurangombo Selatan',
                    'singkatan' => 'Jumbo_Selatan',
                    'kec_id' => 1
                ],
                [
                    'nama_kel' => 'Jurangombo Utara',
                    'singkatan' => 'Jumbo_Utara',
                    'kec_id' => 1
                ],
                [
                    'nama_kel' => 'Rejowinangun Selatan',
                    'singkatan' => 'Rjw_Selatan',
                    'kec_id' => 1
                ],
                [
                    'nama_kel' => 'Tidar Selatan',
                    'singkatan' => 'Tdr_Selatan',
                    'kec_id' => 1
                ],
                [
                    'nama_kel' => 'Tidar Utara',
                    'singkatan' => 'Tdr_Utara',
                    'kec_id' => 1
                ],
                [
                    'nama_kel' => 'Cacaban',
                    'singkatan' => 'Cacaban',
                    'kec_id' => 2
                ],
                [
                    'nama_kel' => 'Magelang',
                    'singkatan' => 'Magelang',
                    'kec_id' => 2
                ],
                [
                    'nama_kel' => 'Panjang',
                    'singkatan' => 'Panjang',
                    'kec_id' => 2
                ],
                [
                    'nama_kel' => 'Kemirirejo',
                    'singkatan' => 'Kemirirejo',
                    'kec_id' => 2
                ],
                [
                    'nama_kel' => 'Gelangan',
                    'singkatan' => 'Gelangan',
                    'kec_id' => 2
                ],
                [
                    'nama_kel' => 'Rejowinangun Utara',
                    'singkatan' => 'Rjw_Utara',
                    'kec_id' => 2
                ],
                [
                    'nama_kel' => 'Potrobangsan',
                    'singkatan' => 'PtrBangsan',
                    'kec_id' => 3
                ],
                [
                    'nama_kel' => 'Wates',
                    'singkatan' => 'Wates',
                    'kec_id' => 3
                ],
                [
                    'nama_kel' => 'Kramat Utara',
                    'singkatan' => 'Krm_Utara',
                    'kec_id' => 3
                ],
                [
                    'nama_kel' => 'Kramat Selatan',
                    'singkatan' => 'Krm_Selatan',
                    'kec_id' => 3
                ],
                [
                    'nama_kel' => 'Kedungsari',
                    'singkatan' => 'Kedungsari',
                    'kec_id' => 3
                ]

            )
        );
    }
}
