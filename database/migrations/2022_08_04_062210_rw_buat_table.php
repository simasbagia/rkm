<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RwBuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('rw', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('rw', 2);
        //     $table->foreignId('kec_id')->reference('id')->on('kec');
        //     $table->foreignId('kel_id')->reference('id')->on('kel');
        //     $table->string('ketua')->nullable();
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
        // Schema::dropIfExists('rw');
    }
}
