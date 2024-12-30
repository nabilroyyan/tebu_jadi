<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; // Gunakan DB facade untuk insert langsung
use Carbon\Carbon; // Untuk menangani tanggal dan waktu

class AnggotasSeeder extends Seeder
{
    public function run()
    {
        DB::table('anggotas')->insert([
            [
                'nama' => 'IYANDI AGUSTA',
                'jabatan' => 'Kabag. Tanaman',
                'created_at' => Carbon::parse('2024-08-05 22:49:40'),
                'updated_at' => Carbon::parse('2024-08-05 22:49:40'),
            ],
            [
                'nama' => 'JAYANTO HADI',
                'jabatan' => 'Kabag. AKT_KEU',
                'created_at' => Carbon::parse('2024-08-05 22:50:10'),
                'updated_at' => Carbon::parse('2024-08-05 22:50:10'),
            ],
        ]);
    }
}
