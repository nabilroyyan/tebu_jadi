<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebun extends Model
{
    use HasFactory;

    protected $table = 'db_master_kebun';  // Nama tabel
    protected $fillable = [
        'nomer_kontrak',
        'nama_kebun',
        'alamat',
        'luas',
        'kecamatan',
        'kabupaten',
        'nama_petani',
        'status',
    ];
}
