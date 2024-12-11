<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data admin ke tabel admin
        DB::table('users')->insert(
            array(
                [
                    'name' => "SuperAdmin",
                    'email' => "admin@gmail.com",
                    'password' => Hash::make("admin"),
                    'level' => 'eSuperAdmin',
                    'aktif' => 'S'
                ],
                [
                    'name' => "PendampingRT",
                    'email' => "pdrt@gmail.com",
                    'password' => Hash::make("pdrt"),
                    'level' => 'ePendampingRt',
                    'aktif' => 'B'
                ],
                [
                    'name' => "OPD",
                    'email' => "opd@gmail.com",
                    'password' => Hash::make("opd"),
                    'level' => 'eOpd',
                    'aktif' => 'B'
                ]
            )
        );
    }
}
