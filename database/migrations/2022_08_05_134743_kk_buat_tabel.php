<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KkBuatTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kk', function (Blueprint $table) {
            $table->id();
            $table->string('kk', 20);
            $table->foreignId('kec_id')->reference('id')->on('kec');
            $table->foreignId('kel_id')->reference('id')->on('kel');
            $table->foreignId('rw_id')->reference('id')->on('rw');
            $table->foreignId('rt_id')->reference('id')->on('rt');
            $table->enum('aktif', ['Y', 'T'])->nullable();
            $table->enum('rumah', [
                'Sendiri',
                'Menumpang',
                'Sewa'
            ])->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kk');
    }
}
