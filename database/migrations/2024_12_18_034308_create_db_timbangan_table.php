<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_timbangan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_timbangan')->autoIncrement();
            $table->string('no_spa');
            $table->date('tanggal');
            $table->string('nomer_Kontrak');
            $table->string('nama_kebun');
            $table->string('nama_petani');
            $table->unsignedInteger('nopol');
            $table->string('sopir');
            $table->enum('status_timbang', ['proses', 'selesai_ditimbang']);
            $table->float('bruto', 10, 2);
            $table->float('tara', 10, 2);
            $table->float('neto', 10, 2);
            $table->date('tgl_masuk_pos')->nullable();
            $table->datetime('tgl_timb_masuk')->nullable();
            $table->datetime('tgl_timb_keluar')->nullable();
            $table->string('jenis_tebu');
            $table->string('brix');
            $table->timestamps();


            $table->foreign('nomer_kontrak')->references('nomer_kontrak')->on('db_master_kebun')->onDelete('cascade');
            $table->foreign('nama_kebun')->references('nama_kebun')->on('db_master_kebun')->onDelete('cascade');
            $table->foreign('nama_petani')->references('nama_petani')->on('db_master_kebun')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_timbangan');
    }
};
