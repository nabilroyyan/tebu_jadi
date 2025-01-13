<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; // Gunakan DB facade untuk insert langsung
use Carbon\Carbon; // Untuk menangani tanggal dan waktu

class HalamanRelatedSeeder extends Seeder
{
    public function run()
    {
        DB::table('halaman_related')->insert([
            'namaPabrik' => 'PT PABRIK GULA CANDI BARU',
            'judulLaman' => 'PERHITUNGAN HASIL (PH)',
            'namaLokasi' => 'SIDOARJO',
            'header1' => 'Berdasar lapoan bagian pabrikasi. didapat perhitungan dengan hasil sbb:',
            'header2' => 'A.Pendapatan Petani',
            'header3' => 'B.Hutang Petani',
            'created_at' => Carbon::parse('2024-08-05 19:03:00'),
            'updated_at' => Carbon::parse('2024-08-06 18:18:54'),
        ]);
    }
}
