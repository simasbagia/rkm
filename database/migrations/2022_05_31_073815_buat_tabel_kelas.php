<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('kelas', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('jenjang_id')->reference('id')->on('jenjang');
        //     $table->foreignId('unit_id')->reference('id')->on('unit');
        //     $table->string('nama_kelas', 100);
        //     $table->longText('deskripsi')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('kelas');
    }
}
