<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id(); // id auto increment
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Untuk soft delete
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
