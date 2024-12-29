<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebun extends Model
{
    use HasFactory;

    protected $table = 'db_master_kebun';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nomer_kontrak',
        'nama_kebun',
        'alamat',
        'luas',
        'kecamatan',
        'kabupaten',
        'nama_petani',
    ];

    /**
     * Relasi dengan tb_timbangan
     */
    public function timbangans()
    {
        return $this->hasMany(tb_Timbangan::class, 'nomer_kontrak', 'nomer_kontrak');
    }
}
