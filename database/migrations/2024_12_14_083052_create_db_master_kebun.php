<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('db_master_kebun', function (Blueprint $table) {
            $table->id();  // Kolom ID default
            $table->string('nomer_kontrak', 50);  // Menambahkan panjang kolom
            $table->string('nama_kebun', 100);   // Menambahkan panjang kolom
            $table->string('alamat', 255);       // Menambahkan panjang kolom
            $table->string('luas', 50);          // Menambahkan panjang kolom
            $table->string('kecamatan', 100);    // Menambahkan panjang kolom
            $table->string('kabupaten', 100);    // Menambahkan panjang kolom
            $table->string('nama_petani', 100); // Menambahkan panjang kolom
            $table->string('status', 50);        // Menambahkan panjang kolom
            $table->timestamps();  // Kolom created_at dan updated_at otomatis
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('db_master_kebun');  // Menghapus tabel jika migrasi dibatalkan
    }
};
