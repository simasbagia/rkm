<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DptBuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('dpt', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('kk', 20);
        //     $table->string('nik', 50);
        //     $table->string('nama', 150);
        //     $table->string('tpl', 30);
        //     $table->string('tgl', 12);
        //     $table->string('nikah', 2);
        //     $table->string('jk', 10);
        //     $table->string('alamat', 100);
        //     $table->string('rt', 3);
        //     $table->string('rw', 3);
        //     $table->foreignId('tps_id')->reference('id')->on('tps');
        //     $table->foreignId('kel_id')->reference('id')->on('kel');
        //     $table->foreignId('kec_id')->reference('id')->on('kec');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('dpt');
    }
}
