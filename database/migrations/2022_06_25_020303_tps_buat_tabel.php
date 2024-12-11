<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TpsBuatTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tps', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama_tps', 100);
        //     $table->foreignId('kel_id')->reference('id')->on('kel');
        //     $table->string('tahun', 4)->nullable();
        //     $table->string('pil', 20)->nullable();
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
        // Schema::dropIfExists('tps');
    }
}
