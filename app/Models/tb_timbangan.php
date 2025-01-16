<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Timbangan extends Model
{
    use HasFactory;
    protected $table = 'tb_timbangan';
    protected $primaryKey = 'id_timbangan';
    protected $fillable = [
        'no_spa',
        'tanggal',
        'master_kebun_id',
        'nama_kebun',
        'nama_petani',
        'nopol',
        'sopir',
        'status_timbang',
        'bruto',
        'tara',
        'neto',
        'jenis_tebu',
        'brix',
    ];

    public function masterKebunByNama()
    {
        return $this->belongsTo(Kebun::class, 'nama_kebun', 'nama_kebun');
    }
    public function masterKebunByKontrak()
    {
        return $this->belongsTo(Kebun::class, 'nomer_kontrak', 'nomer_kontrak');
    }

    public function masterPetaniByNama()
    {
        return $this->belongsTo(Kebun::class, 'nama_petani', 'nama_petani');
    }
}
