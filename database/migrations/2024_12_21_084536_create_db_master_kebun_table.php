<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbMasterKebunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_master_kebun', function (Blueprint $table) {
            $table->unsignedBigInteger('id_master_kebun')->autoIncrement();
            $table->string('nomer_kontrak')->unique();
            $table->string('nama_kebun', 100);
            $table->string('alamat', 255);
            $table->string('luas');
            $table->string('kecamatan', 100);
            $table->string('kabupaten', 100);
            $table->string('nama_petani', 100);
            $table->enum('status', ['Diterima', 'Ditolak']);
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
        Schema::dropIfExists('db_master_kebun');
    }
}
