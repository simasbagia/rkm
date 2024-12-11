<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('unit', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama_unit', 100);
        //     $table->string('singkatan', 20)->nullable();
        //     $table->longText('alamat')->nullable();
        //     $table->enum('aktif', ['Y', 'N']);
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
        // Schema::dropIfExists('unit');
    }
}
