<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutangsAndTransaksisTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create tb_hutangs table
        Schema::create('tb_hutangs', function (Blueprint $table) {
            $table->id();
            $table->string('nokontrak', 50);
            $table->unsignedBigInteger('pinjaman');
            $table->unsignedBigInteger('angsuran_sisa');
            $table->enum('status', ['diproses', 'diterima', 'ditolak'])->default('diproses');
            $table->string('nama_petani', 100)->nullable();
            $table->timestamps();

            // Generated column
            $table->unsignedBigInteger('sisa')->storedAs('pinjaman - angsuran_sisa');
        });

        // Create tb_transaksis table
        Schema::create('tb_transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nokontrak', 50);
            $table->unsignedBigInteger('angsuran');
            $table->enum('status', ['diverifikasi', 'belum diverifikasi'])->default('belum diverifikasi');
            $table->unsignedBigInteger('recid');
            $table->timestamps();
        });

        // Add unique constraint to nomer_kontrak in db_master_kebun
        Schema::table('db_master_kebun', function (Blueprint $table) {
            $table->unique('nomer_kontrak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('db_master_kebun', function (Blueprint $table) {
            $table->dropUnique(['nomer_kontrak']);
        });

        Schema::dropIfExists('tb_transaksis');
        Schema::dropIfExists('tb_hutangs');
    }
}
