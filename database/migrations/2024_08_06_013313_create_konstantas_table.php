<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonstantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konstantas', function (Blueprint $table) {
            $table->id();
            $table->integer('nilaiGula');
            $table->integer('nilaiTetes');
            $table->integer('biayaUpah');
            $table->integer('angkutTruk');
            $table->integer('biayaEksplo');
            $table->integer('biayaRDKK');
            $table->integer('biayaLinting');
            $table->integer('biaaZAK');
            $table->integer('iuranAPTRI');
            $table->integer('biayaCrane');
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
        Schema::dropIfExists('konstantas');
    }
}
