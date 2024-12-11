<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelWarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('warga', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('dpt_id')->reference('id')->on('dpt');
        //     $table->enum('kta', ['sudah', 'belum', 'proses']);
        //     $table->enum('sosial', ['-', 'muzaki', 'mustahik']);
        //     $table->enum('status', [
        //         'pengurus',
        //         'korwe',
        //         'korte',
        //         'relawan',
        //         'simpatisan'
        //     ]);
        //     $table->string('keterangan')->nullable();
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
        // Schema::dropIfExists('warga');
    }
}
