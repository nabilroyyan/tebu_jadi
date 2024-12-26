<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Timbangan extends Model
{
    use HasFactory;
    protected $table = 'tb_timbangan';
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
        'tgl_masuk_pos',
        'tgl_timb_masuk',
        'tgl_timb_keluar',
        'jenis_tebu',
        'brix',
    ];

    public function masterKebunByNama()
    {
        return $this->belongsTo(Kebun::class, 'nama_kebun', 'nama_kebun');
    }

    public function masterPetaniByNama()
    {
        return $this->belongsTo(Kebun::class, 'nama_petani', 'nama_petani');
    }
}
