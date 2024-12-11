<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data setting ke tabel setting
        DB::table('setting')->insert([
            'nama_sekolah' => "RMBO",
            'alamat_sekolah' => "Kota Magelang",
            'email_sekolah' => "rmbo@gmail.com",
            'telp_sekolah' => "(0293) 3191913",
            'logo_sekolah' => "logo.png",
            'judul_header' => "logo.png",
        ]);
    }
}
