<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class db_timbangan extends Model
{
    use HasFactory;

    protected $table = '$db_timbangan';

    protected $primaryKey = 'no_spa';

    // Disable auto-incrementing for non-integer primary keys
    public $incrementing = false;

    // Tipe primary key
    protected $keyType = 'string';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'no_spa',
        'tanggal',
        'noKontrak',
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

    // Cast kolom ke tipe data tertentu
    protected $casts = [
        'tanggal' => 'date',
        'tgl_masuk_pos' => 'date',
        'tgl_timb_masuk' => 'datetime',
        'tgl_timb_keluar' => 'datetime',
        'bruto' => 'float',
        'tara' => 'float',
        'neto' => 'float',
        'status_timbang' => 'string',
    ];

    // Relasi ke tabel db_master_kebun
    public function kebun()
    {
        return $this->belongsTo(Kebun::class, 'nama_kebun', 'nama_kebun');
    }

    public function petani()
    {
        return $this->belongsTo(Kebun::class, 'nama_petani', 'nama_petani');
    }
}

