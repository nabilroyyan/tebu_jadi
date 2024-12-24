<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTransaksi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tb_transaksis'; // Sesuaikan dengan nama tabel Anda

    // Tentukan kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nokontrak', 
        'angsuran', 
        'status', 
        'recid'
    ];

    // Relasi dengan model TbHutang (menghubungkan transaksi dengan hutang)
    public function hutang()
    {
        return $this->belongsTo(TbHutang::class, 'recid', 'id');
    }

    // Relasi dengan model MasterKebun (menghubungkan transaksi dengan kebun)
    public function kebun()
    {
        return $this->belongsTo(kebun::class, 'nokontrak', 'nomer_kontrak');
    }
}
