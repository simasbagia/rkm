<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KelBuatTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('kel', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama_kel', 100);
        //     $table->foreignId('kec_id')->reference('id')->on('kec');
        //     $table->foreignId('pendamping_id')->reference('id')->on('user')->nullable();
        //     $table->string('singkatan', 20)->nullable();
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
        // Schema::dropIfExists('kel');
    }
}
