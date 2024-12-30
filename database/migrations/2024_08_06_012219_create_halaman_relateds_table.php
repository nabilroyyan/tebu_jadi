<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalamanRelatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halaman_related', function (Blueprint $table) {
            $table->id();
            $table->string('namaPabrik');
            $table->string('judulLaman');
            $table->string('namaLokasi');
            $table->string('header1');
            $table->string('header2');
            $table->string('header3');
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
        Schema::dropIfExists('halaman_relateds');
    }
}
