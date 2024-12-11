<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RtBuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('rt', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('rt', 2);
        //     $table->foreignId('kec_id')->reference('id')->on('kec');
        //     $table->foreignId('kel_id')->reference('id')->on('kel');
        //     $table->foreignId('rw_id')->reference('id')->on('rw');
        //     $table->foreignId('pendamping_id')->reference('id')->on('user')->nullable();
        //     $table->string('ketua')->nullable();
        //     $table->string('pokmas')->nullable();
        //     $table->string('deskripsi')->nullable();
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
        // Schema::dropIfExists('rt');
    }
}
