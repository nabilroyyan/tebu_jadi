<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbHutang extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tb_hutangs'; // Sesuaikan dengan nama tabel Anda

    // Tentukan kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nokontrak', 
        'nama_petani',
        'pinjaman', 
        'angsuran_sisa', 
        'status'
    ];
    // Relasi dengan model MasterKebun (jika ada)
    public function kebun()
    {
        return $this->belongsTo(kebun::class, 'nokontrak', 'nomer_kontrak');
    }
}
