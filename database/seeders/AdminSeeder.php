<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data admin ke tabel admin
        DB::table('admin')->insert([
        	'name' => "Admin",
        	'email' => "admin@gmail.com",
        	'password' =>Hash::make("admin")
        ]);
    }
}