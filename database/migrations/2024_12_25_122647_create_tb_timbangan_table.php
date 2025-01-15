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

            $table->unsignedBigInteger('master_kebun_id');
            $table->foreign('master_kebun_id')->references('id_master_kebun')->on('db_master_kebun');


            $table->string('nama_kebun');
            $table->string('nama_petani');
            $table->string('nopol');
            $table->string('sopir');
            $table->enum('status_timbang', ['proses', 'selesai ditimbang']);
            $table->float('bruto', 10, 2)->nullable();
            $table->float('tara', 10, 2)->nullable();
            $table->float('neto', 10, 2)->nullable();
            $table->date('tgl_masuk_pos')->nullable();
            $table->datetime('tgl_timb_masuk')->nullable();
            $table->datetime('tgl_timb_keluar')->nullable();
            $table->enum('jenis_tebu',['lokal','non lokal']);
            $table->string('brix');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_timbangan');
    }
};
